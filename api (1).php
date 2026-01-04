<?php
// api.php
// Konfigurasi Header agar bisa diakses oleh frontend (CORS & JSON)
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE");

// --- KONFIGURASI RAHASIA ---
$apiKey = "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";
$baseUrl = "https://api.groq.com/openai/v1";
$baseUrlV1 = "https://api.groq.com/v1"; // Untuk endpoint fine_tunings yang beda struktur

// --- DATA MODEL (Single Model Chat & Image sesuai instruksi) ---
$models = [
    ["id" => "meta-llama/llama-4-maverick-17b-128e-instruct", "name" => "Ari Unlimited"]
];

// --- VOICE MODELS (Sesuai instruksi untuk menambahkan semua model suara) ---
$voice_models = [
    "whisper-large-v3-turbo",
];

// Handle Preflight Request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

// 1. MODE CONFIG: Mengirim daftar model ke Frontend
if (isset($_GET['mode']) && $_GET['mode'] === 'config') {
    echo json_encode($models);
    exit;
}

// 2. MAIN PROXY LOGIC
// Mendeteksi endpoint tujuan berdasarkan parameter GET 'endpoint' atau default ke chat/completions
$endpoint = $_GET['endpoint'] ?? 'chat/completions';
$method = $_SERVER['REQUEST_METHOD'];

// Tentukan URL target lengkap berdasarkan endpoint
$targetUrl = "";

switch ($endpoint) {
    // Standard OpenAI Compatible Endpoints
    case 'chat/completions':
        $targetUrl = "$baseUrl/chat/completions";
        break;
    case 'audio/transcriptions':
        $targetUrl = "$baseUrl/audio/transcriptions";
        break;
    case 'audio/translations':
        $targetUrl = "$baseUrl/audio/translations";
        break;
    case 'audio/speech':
        $targetUrl = "$baseUrl/audio/speech";
        break;
    case 'batches':
        // Menangani parameter ID untuk batch jika ada
        $batchId = $_GET['batch_id'] ?? '';
        $action = $_GET['action'] ?? ''; // misal: cancel
        if ($batchId) {
            $targetUrl = "$baseUrl/batches/$batchId" . ($action ? "/$action" : "");
        } else {
            $targetUrl = "$baseUrl/batches";
        }
        break;
    case 'files':
        $fileId = $_GET['file_id'] ?? '';
        $sub = $_GET['sub'] ?? ''; // misal: content
        if ($fileId) {
            $targetUrl = "$baseUrl/files/$fileId" . ($sub ? "/$sub" : "");
        } else {
            $targetUrl = "$baseUrl/files";
        }
        break;
    case 'models':
        $modelIdParam = $_GET['model_id'] ?? '';
        if ($modelIdParam) {
            $targetUrl = "$baseUrl/models/$modelIdParam";
        } else {
            $targetUrl = "$baseUrl/models";
        }
        break;
        
    // Non-Standard / V1 Endpoints
    case 'fine_tunings':
        $ftId = $_GET['id'] ?? '';
        if ($ftId) {
            $targetUrl = "$baseUrlV1/fine_tunings/$ftId";
        } else {
            $targetUrl = "$baseUrlV1/fine_tunings";
        }
        break;

    default:
        // Default fallback ke chat completion jika endpoint tidak dikenal
        $targetUrl = "$baseUrl/chat/completions";
        break;
}

// Persiapkan cURL
$ch = curl_init($targetUrl);
$headers = [
    "Authorization: Bearer " . $apiKey
];

// Handle Input Data
if ($method === 'POST') {
    curl_setopt($ch, CURLOPT_POST, 1);
    
    // Cek Content-Type dari request asli untuk menangani File Upload (Multipart) vs JSON
    $contentType = $_SERVER['CONTENT_TYPE'] ?? '';

    if (strpos($contentType, 'multipart/form-data') !== false) {
        // Jika upload file (audio/files), teruskan $_POST dan $_FILES
        // Implementasi sederhana untuk forwarding file memerlukan penanganan khusus php
        // Untuk saat ini, kita fokus ke JSON body seperti chat
        $postData = file_get_contents("php://input");
        // Note: Forwarding multipart files via raw PHP proxy is complex. 
        // Assuming frontend sends JSON for chat currently.
    } else {
        // JSON Body (Chat, Batches, dll)
        $inputJSON = file_get_contents("php://input");
        $input = json_decode($inputJSON, true);
        
        // UNLOCK LOGIC:
        // Jika endpoint adalah chat/completions, kita TIDAK memaksa model.
        // Kita hanya mengisi default jika client tidak mengirimkan model.
        if ($endpoint === 'chat/completions' && $input) {
            
            // Cek apakah model dikirim? Jika tidak, baru pakai default. Jika ada, biarkan.
            if (!isset($input['model']) || empty($input['model'])) {
                $input['model'] = "llama-4-scout-17b-16e-instruct";
            }
            
            // Pastikan parameter standar chat
            if (!isset($input['temperature'])) $input['temperature'] = 0.7;
            if (!isset($input['max_tokens'])) $input['max_tokens'] = 3000;
            
            $postData = json_encode($input);
            $headers[] = "Content-Type: application/json";
        } else {
            $postData = $inputJSON;
            $headers[] = "Content-Type: application/json";
        }
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    }
} else if ($method === 'GET' || $method === 'DELETE') {
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    // GET request tidak butuh body, parameter biasanya di URL
}

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Uncomment jika server lokal bermasalah SSL

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo json_encode(["error" => ["message" => "Server Error: " . curl_error($ch)]]);
} else {
    echo $response;
}

curl_close($ch);
?>

<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
     <meta name="google-adsense-account" content="ca-pub-6217352518058142">    
     <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6217352518058142"
     crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="manifest" href="manifest.json">
    <meta name="theme-color" content="#0b111e">
    <meta name="google-site-verification" content="BMxNo49M7yu_pXD3S-23RlSR_lPf5pF6ENTVeJDSvdY" />
    <link rel="icon" type="image/png" href="https://airaw.online/favicon.png">
    <title>AI RAW - Unlimited</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&family=Rajdhani:wght@500;600;700&display=swap" rel="stylesheet">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/marked/4.3.0/marked.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>

    <script src="https://accounts.google.com/gsi/client" async defer></script>
    
    <style>
         /* --- CUSTOM SCROLLBAR --- */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: var(--border-color); border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--accent-color); }

        /* --- MARKDOWN STYLES --- */
        .bubble table {
            width: 100%; border-collapse: collapse; margin: 15px 0;
            background: rgba(0,0,0,0.2); border-radius: 8px; overflow: hidden;
            font-size: 0.9em;
        }
        .bubble th, .bubble td {
            padding: 10px 15px; text-align: left;
            border-bottom: 1px solid var(--border-color);
        }
        .bubble th {
            background: rgba(101, 179, 46, 0.15); color: var(--accent-color); font-weight: 700;
        }
        .bubble tr:last-child td { border-bottom: none; }
        
        .bubble blockquote {
            border-left: 4px solid var(--accent-color); margin: 15px 0;
            padding-left: 15px; color: #94a3b8; font-style: italic; background: rgba(255,255,255,0.02); padding: 10px; border-radius: 0 8px 8px 0;
        }
        .bubble ul, .bubble ol { margin-left: 20px; margin-bottom: 10px; }
        .bubble li { margin-bottom: 5px; }
        .bubble a { color: var(--accent-color); text-decoration: none; border-bottom: 1px dotted currentColor; }
        .bubble a:hover { text-decoration: none; border-bottom: 1px solid currentColor; }

        /* --- TOAST NOTIFICATION --- */
        #toast-container {
            position: fixed; bottom: 80px; left: 50%; transform: translateX(-50%);
            z-index: 2000; pointer-events: none;
        }
        .toast-msg {
            background: var(--user-bubble); color: var(--text-color);
            border: 1px solid var(--accent-color); padding: 10px 20px;
            border-radius: 30px; margin-top: 10px; font-size: 0.9rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5); opacity: 0;
            animation: toastUp 0.3s forwards, fadeOut 0.5s 2.5s forwards;
            display: flex; align-items: center; gap: 8px; backdrop-filter: blur(5px);
        }
        @keyframes toastUp { from { transform: translateY(20px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
        @keyframes fadeOut { from { opacity: 1; } to { opacity: 0; } }

        /* --- TEMA (DARK & LIGHT) --- */
        :root {
            /* Dark Mode (Default) */
            --bg-color: #0b1120;       
            --text-color: #f1f5f9;     
            --accent-color: #65B32E;   
            --accent-hover: #76c93b;
            --gold-color: #FFD700; 
            --header-bg: rgba(11, 17, 32, 0.98);
            --sidebar-bg: #0b1120; 
            --user-bubble: #1e293b;        
            --border-color: #334155;
            --input-bg: #1e293b;
            --font-main: 'Inter', sans-serif;
            --font-head: 'Rajdhani', sans-serif; 
            --shadow-soft: 0 4px 15px rgba(0,0,0,0.3);
            --code-bg: #1e1e1e;
            --modal-bg: rgba(11, 17, 32, 0.95);
        }

        [data-theme="light"] {
            --bg-color: #ffffff;
            --text-color: #1e293b;
            --accent-color: #65B32E;
            --accent-hover: #4d8f1e;
            --header-bg: rgba(255, 255, 255, 0.98);
            --sidebar-bg: #f8fafc;
            --user-bubble: #e2e8f0;
            --border-color: #cbd5e1;
            --input-bg: #f1f5f9;
            --shadow-soft: 0 4px 15px rgba(0,0,0,0.05);
            --code-bg: #2d2d2d;
            --modal-bg: rgba(255, 255, 255, 0.95);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        html, body {
            height: 100%; height: 100dvh; width: 100%;
            overflow: hidden; 
            background-color: var(--bg-color);
            color: var(--text-color);
            font-family: var(--font-main);
            display: flex;
            transition: background-color 0.3s, color 0.3s;
        }

        .app-layout { display: flex; width: 100%; height: 100%; }

        /* --- SIDEBAR --- */
        .sidebar {
            width: 280px; background: var(--sidebar-bg);
            border-right: 1px solid var(--border-color);
            display: flex; flex-direction: column;
            padding: 20px; transition: transform 0.3s ease;
            z-index: 70; position: relative;
        }

        .sidebar-header {
            font-family: var(--font-head); font-size: 1.2rem; font-weight: 700;
            margin-bottom: 20px; color: var(--accent-color);
            display: flex; align-items: center; justify-content: space-between; gap: 10px;
            width: 100%;
        }
        
        .unlimited-container { display: flex; align-items: center; }
        .logo-u {
            width: 20px; height: 20px; border: 2px solid var(--gold-color);
            border-radius: 50%; display: flex; align-items: center; justify-content: center;
            font-size: 11px; font-weight: 800; color: var(--gold-color); margin-right: 6px;
            box-shadow: 0 0 8px rgba(255, 215, 0, 0.2); font-family: var(--font-head); flex-shrink: 0;
        }
        .unlimited-badge {
            color: var(--gold-color); font-weight: 800; font-style: italic;
            text-shadow: 0 0 10px rgba(255, 215, 0, 0.2); font-size: 0.9em; letter-spacing: 1px;
        }

        /* Auth */
        .user-profile-section {
            padding-bottom: 15px; border-bottom: 1px solid var(--border-color);
            margin-bottom: 15px; display: flex; flex-direction: column; gap: 10px;
        }
        #g_id_onload { display: none; }
        .google-login-wrapper { width: 100%; display: flex; justify-content: center; }
        .user-info-display {
            display: none; align-items: center; gap: 10px; 
            font-size: 0.9rem; color: var(--text-color);
            padding: 8px; border: 1px solid var(--border-color); border-radius: 6px;
        }
        .user-info-display img { width: 30px; height: 30px; border-radius: 50%; }
        .btn-logout { 
            font-size: 0.75rem; color: #ef4444; background: none; border: none; 
            cursor: pointer; text-decoration: underline; margin-left: auto; 
        }

        .new-chat-btn {
            width: 100%; padding: 10px; background: var(--accent-color); color: #0b1120;
            border: none; border-radius: 8px; font-weight: 700; cursor: pointer;
            display: flex; align-items: center; justify-content: center; gap: 8px;
            margin-bottom: 15px; transition: 0.2s; font-family: var(--font-head);
        }
        .new-chat-btn:hover { background: var(--accent-hover); }

        .history-container { flex: 1; overflow-y: auto; margin-bottom: 15px; padding-right: 5px; }
        .history-list { list-style: none; }
        .history-item {
            padding: 10px; margin-bottom: 5px; border-radius: 6px;
            cursor: pointer; color: var(--text-color); opacity: 0.8;
            font-size: 0.85rem; display: flex; align-items: center; gap: 10px;
            white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
            transition: 0.2s; border: 1px solid transparent;
        }
        .history-item:hover { background: rgba(101, 179, 46, 0.1); opacity: 1; }
        .history-item.active { 
            background: rgba(101, 179, 46, 0.15); color: var(--accent-color); 
            border-color: rgba(101, 179, 46, 0.3); font-weight: 600;
        }

        .clear-history-btn {
            font-size: 0.75rem; color: #ef4444; background: transparent;
            border: 1px solid rgba(239, 68, 68, 0.3); padding: 8px; width: 100%;
            border-radius: 6px; cursor: pointer; margin-bottom: 10px; text-align: center;
            display: flex; align-items: center; justify-content: center; gap: 5px;
        }
        .clear-history-btn:hover { background: rgba(239, 68, 68, 0.1); }

        .sidebar-menu { list-style: none; margin-top: auto; border-top: 1px solid var(--border-color); padding-top: 10px; }
        .sidebar-menu li {
            padding: 10px; margin-bottom: 5px; border-radius: 8px;
            cursor: pointer; color: var(--text-color); opacity: 0.8;
            transition: 0.2s; font-size: 0.9rem; display: flex; align-items: center; gap: 10px;
        }
        .sidebar-menu li:hover { background: rgba(101, 179, 46, 0.1); opacity: 1; color: var(--accent-color); }
        
        .sidebar-label {
            font-size: 0.75rem; text-transform: uppercase; color: #64748b;
            font-weight: 700; margin-bottom: 10px; margin-top: 5px; letter-spacing: 1px;
            border-top: 1px solid var(--border-color); padding-top: 15px;
        }

        .sidebar-overlay {
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.5); z-index: 60; display: none;
            backdrop-filter: blur(2px);
        }
        .sidebar-overlay.active { display: block; }

        @media (max-width: 768px) {
            .sidebar { position: fixed; height: 100%; transform: translateX(-100%); width: 85%; max-width: 300px; }
            .sidebar.open { transform: translateX(0); }
        }

        .main-content {
            flex: 1; display: flex; flex-direction: column; position: relative;
            height: 100%; overflow: hidden;
        }

        /* HEADER */
        header {
            height: 60px; flex-shrink: 0;
            display: flex; justify-content: space-between; align-items: center;
            background: var(--header-bg);
            border-bottom: 1px solid var(--border-color);
            padding: 0 20px;
            backdrop-filter: blur(10px);
            z-index: 50;
        }

        .header-left { display: flex; align-items: center; gap: 15px; flex: 1; }
        .menu-btn { background: none; border: none; color: var(--text-color); cursor: pointer; display: none; }
        @media (max-width: 768px) { .menu-btn { display: block; } }

        .brand-title {
            font-family: var(--font-head); font-size: 1.3rem; font-weight: 700;
            letter-spacing: 1px; color: var(--accent-color); 
            display: flex; align-items: center;
            gap: 15px; 
        }
        .brand-logo {
            width: 24px; height: 24px; border: 2px solid var(--accent-color);
            border-radius: 50%; display: flex; align-items: center; justify-content: center;
            font-size: 12px; font-weight: 800; color: var(--accent-color); flex-shrink: 0; margin-right: 8px;
        }

        /* --- BACKGROUND FULL & UI API HUD --- */
        #mascot-background {
            position: absolute; width: 100%; height: 100%;
            top: 0; left: 0; z-index: 0; pointer-events: none;
            display: flex; justify-content: center; align-items: center;
            overflow: hidden;
        }
        #mascot-background img {
            width: 100%; height: 100%; object-fit: cover;
            opacity: 0.1; /* Transparansi rendah agar tidak mengganggu */
            animation: breathe 5s ease-in-out infinite;
            position: absolute; top:0; left:0;
        }
        @keyframes breathe { 0%, 100% { transform: scale(1); } 50% { transform: scale(1.05); } }

        /* HUD API VISUALS */
        .hud-container {
            position: absolute; width: 100%; height: 100%;
            padding: 20px;
            pointer-events: none;
            font-family: var(--font-head);
            color: var(--accent-color);
            z-index: 1;
        }
        /* Positions */
        .hud-top-right {
            position: absolute; top: 80px; right: 30px; text-align: right;
            opacity: 0.3; transition: opacity 0.5s;
        }
        .hud-bottom-left {
            position: absolute; bottom: 100px; left: 30px; text-align: left;
            opacity: 0.3; transition: opacity 0.5s;
        }
        /* NEW POSITIONS FOR MORE APIs */
        .hud-top-left {
            position: absolute; top: 80px; left: 30px; text-align: left;
            opacity: 0.3; transition: opacity 0.5s;
        }
        .hud-bottom-right {
            position: absolute; bottom: 100px; right: 30px; text-align: right;
            opacity: 0.3; transition: opacity 0.5s;
        }

        .hud-item {
            margin-bottom: 8px;
            font-size: 0.85rem;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        .hud-item strong { color: var(--text-color); font-weight: 700; }
        .hud-value { font-family: monospace; }
        .hud-small { font-size: 0.7rem; opacity: 0.8; }
        
        /* Responsive HUD */
        @media(max-width: 900px) {
            .hud-top-left, .hud-bottom-right { display: none; } /* Hide extra info on mobile */
            .hud-top-right, .hud-bottom-left { opacity: 0.15; font-size: 0.7rem; }
            .hud-top-right { top: 70px; right: 10px; }
            .hud-bottom-left { bottom: 90px; left: 10px; }
        }

        /* CHAT AREA */
        #chat-wrapper { flex: 1; position: relative; overflow: hidden; display: flex; flex-direction: column; }
        #chat-container { 
            flex: 1; overflow-y: auto; padding: 20px 0; scroll-behavior: smooth; 
            position: relative; z-index: 2; 
        }

        .message-row { width: 100%; padding: 15px 20px; display: flex; animation: fadeIn 0.3s ease-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(5px); } to { opacity: 1; transform: translateY(0); } }

        .message-row.user { justify-content: flex-end; }
        .message-row.user .bubble {
            background: var(--user-bubble); color: var(--text-color);
            padding: 10px 16px; border-radius: 12px 0 12px 12px;
            max-width: 80%; line-height: 1.5; font-size: 0.95rem;
            border: 1px solid var(--border-color);
        }
        .message-row.user .bubble img { max-width: 100%; border-radius: 8px; margin-top: 5px; display: block; }

        .message-row.ai { justify-content: flex-start; width: 100%; padding: 10px 20px; }
        .message-row.ai .message-content {
            width: 100%; max-width: 900px; margin: 0 auto;
            display: flex; gap: 15px; flex-direction: column; 
        }
        .ai-row-inner { display: flex; gap: 15px; width: 100%; }

        .ai .avatar {
            width: 32px; height: 32px; border-radius: 50%;
            background: var(--bg-color); border: 2px solid var(--accent-color);
            color: var(--accent-color); flex-shrink: 0; 
            display: flex; align-items: center; justify-content: center; margin-top: 5px;
            box-shadow: 0 0 10px rgba(101, 179, 46, 0.2);
            font-family: var(--font-head); font-weight: 800; font-size: 16px;
        }
        
        .ai .bubble {
            background: transparent !important; border: none !important; padding: 0 !important;
            color: var(--text-color); width: 100%; line-height: 1.7; font-size: 1rem;
        }
        
        .bubble strong { color: var(--accent-color); font-weight: 700; }
        .bubble code { 
            background: rgba(101, 179, 46, 0.1); color: var(--accent-color);
            padding: 2px 5px; border-radius: 4px; font-family: 'Consolas', monospace; font-size: 0.9em;
        }
        
        /* --- CODE BLOCK STYLING --- */
        .bubble pre {
            background: var(--code-bg) !important; border: 1px solid var(--border-color); 
            border-radius: 10px; margin: 15px 0; overflow: hidden; position: relative;
        }
        .code-header {
            display: flex; justify-content: space-between; align-items: center;
            background: rgba(0,0,0,0.3); padding: 8px 15px; border-bottom: 1px solid var(--border-color);
            color: #94a3b8; font-family: var(--font-main); font-size: 0.8rem;
        }
        .copy-btn-wrapper {
            display: flex; align-items: center; gap: 6px; cursor: pointer;
            transition: 0.2s; color: var(--accent-color); font-weight: 600;
        }
        .copy-btn-wrapper:hover { color: #fff; }
        .copy-icon { width: 14px; height: 14px; fill: none; stroke: currentColor; stroke-width: 2; }
        .bubble pre code { background: transparent; padding: 15px; display: block; overflow-x: auto; color: #e2e8f0; border: none; }

        /* INPUT AREA */
        .input-container {
            flex-shrink: 0; background: var(--bg-color); 
            padding: 10px 20px 20px 20px; z-index: 50;
            display: flex; justify-content: center; flex-direction: column; align-items: center;
        }
        #image-preview-container { width: 100%; max-width: 900px; display: none; padding-bottom: 10px; }
        .img-preview-box { position: relative; display: inline-block; }
        .img-preview-box img { height: 60px; border-radius: 8px; border: 1px solid var(--accent-color); }
        .img-remove-btn {
            position: absolute; top: -5px; right: -5px;
            background: #ef4444; color: white; border-radius: 50%;
            width: 18px; height: 18px; display: flex; align-items: center; justify-content: center;
            cursor: pointer; font-size: 10px;
        }
        .input-wrapper {
            width: 100%; max-width: 900px; display: flex; align-items: flex-end;
            background: var(--input-bg); border-radius: 12px; 
            border: 1px solid var(--border-color); padding: 5px;
            box-shadow: var(--shadow-soft); transition: all 0.3s;
        }
        .input-wrapper:focus-within { border-color: var(--accent-color); }
        textarea {
            flex: 1; background: transparent; border: none; color: var(--text-color);
            padding: 12px 15px; font-family: var(--font-main); font-size: 1rem;
            resize: none; max-height: 150px; outline: none; line-height: 1.5;
        }
        .input-actions { display: flex; align-items: center; gap: 5px; padding-right: 5px; padding-left: 5px; }
        .icon-btn {
            background: transparent; border: none; width: 36px; height: 36px; border-radius: 8px;
            display: flex; align-items: center; justify-content: center; cursor: pointer;
            transition: 0.2s; color: #64748b;
        }
        .icon-btn:hover { color: var(--accent-color); background: rgba(101,179,46,0.1); }
        button#send-btn {
            background: var(--accent-color); border: none; width: 40px; height: 40px; border-radius: 8px;
            display: flex; align-items: center; justify-content: center; cursor: pointer; 
            tra

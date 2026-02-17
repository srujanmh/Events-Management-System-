<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>AI & ML Hero with Coding Background</title>
  <style>
    body {
      margin: 0;
      font-family: sans-serif;
      background: #0a0a0a;
    }

    .hero {
      position: relative;
      padding: 100px 20px;
      background: linear-gradient(135deg, #0ea5a4, #06b6d4, #3b82f6, #0ea5a4);
      background-size: 400% 400%;
      animation: gradientShift 15s ease infinite;
      color: #fff;
      border-radius: 16px;
      text-align: center;
      overflow: hidden;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    @keyframes gradientShift {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    /* Background canvas */
    #network-bg {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 0;
      opacity: 0.35;
    }

    .hero-content {
      position: relative;
      z-index: 1;
      max-width: 700px;
    }

    .hero h1 {
      font-size: clamp(2rem, 5vw, 3.5rem);
      margin-bottom: 20px;
    }

    .hero p {
      font-size: 1.2rem;
      margin-bottom: 32px;
      color: #e0f2f1;
    }

    .hero .btn {
      display: inline-block;
      margin: 8px;
      padding: 14px 24px;
      border-radius: 8px;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.3s ease;
    }

    .hero .btn-primary {
      background: #fff;
      color: #0ea5a4;
    }
    .hero .btn-primary:hover {
      background: #e0f2f1;
      transform: scale(1.05);
    }

    .hero .btn-ghost {
      background: transparent;
      color: #fff;
      border: 1px solid #fff;
    }
    .hero .btn-ghost:hover {
      background: rgba(255,255,255,0.1);
      transform: scale(1.05);
    }
  </style>
</head>
<body>
  <section class="hero">
    <canvas id="network-bg"></canvas>

    <div class="hero-content">
      <h1>AI & ML — Powering Creativity</h1>
      <p>
        Discover how Artificial Intelligence and Machine Learning transform ideas into reality.
        From generative art to intelligent assistants, innovation starts here.
      </p>
      <a href="#projects" class="btn btn-primary">Get Started</a>
      <a href="#about" class="btn btn-ghost">Learn More</a>
    </div>
  </section>

  <script>
    // ===== Neural Network Background + Floating Keywords =====
    const canvas = document.getElementById("network-bg");
    const ctx = canvas.getContext("2d");

    function resizeCanvas() {
      canvas.width = window.innerWidth;
      canvas.height = document.querySelector(".hero").offsetHeight;
    }
    resizeCanvas();

    const nodes = [];
    const nodeCount = 60;
    const keywords = ["AI", "ML", "DATA", "CODE", "NEURAL"];

    // Create nodes
    for (let i = 0; i < nodeCount; i++) {
      nodes.push({
        x: Math.random() * canvas.width,
        y: Math.random() * canvas.height,
        vx: (Math.random() - 0.5) * 0.7,
        vy: (Math.random() - 0.5) * 0.7,
        radius: 2 + Math.random() * 2
      });
    }

    // Create floating keywords
    const texts = [];
    for (let i = 0; i < keywords.length; i++) {
      texts.push({
        text: keywords[i],
        x: Math.random() * canvas.width,
        y: Math.random() * canvas.height,
        vx: (Math.random() - 0.5) * 0.3,
        vy: (Math.random() - 0.5) * 0.3
      });
    }

    function drawNetwork() {
      ctx.clearRect(0, 0, canvas.width, canvas.height);

      // Draw connections
      for (let i = 0; i < nodes.length; i++) {
        for (let j = i + 1; j < nodes.length; j++) {
          const dx = nodes[i].x - nodes[j].x;
          const dy = nodes[i].y - nodes[j].y;
          const dist = Math.sqrt(dx * dx + dy * dy);

          if (dist < 120) {
            ctx.strokeStyle = "rgba(255,255,255," + (1 - dist / 120) + ")";
            ctx.lineWidth = 1;
            ctx.beginPath();
            ctx.moveTo(nodes[i].x, nodes[i].y);
            ctx.lineTo(nodes[j].x, nodes[j].y);
            ctx.stroke();
          }
        }
      }

      // Draw nodes
      nodes.forEach(node => {
        ctx.beginPath();
        ctx.arc(node.x, node.y, node.radius, 0, Math.PI * 2);
        ctx.fillStyle = "#00ffcc";
        ctx.fill();

        node.x += node.vx;
        node.y += node.vy;
        if (node.x < 0 || node.x > canvas.width) node.vx *= -1;
        if (node.y < 0 || node.y > canvas.height) node.vy *= -1;
      });

      // Draw floating keywords
      ctx.font = "16px monospace";
      ctx.fillStyle = "#ffffff";
      texts.forEach(t => {
        ctx.fillText(t.text, t.x, t.y);
        t.x += t.vx;
        t.y += t.vy;

        if (t.x < 0 || t.x > canvas.width - 40) t.vx *= -1;
        if (t.y < 20 || t.y > canvas.height - 20) t.vy *= -1;
      });

      requestAnimationFrame(drawNetwork);
    }

    drawNetwork();
    window.addEventListener("resize", resizeCanvas);
  </script>
</body>
</html>

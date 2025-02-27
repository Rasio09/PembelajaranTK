<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PENGHUBUNG BENTUK LINGKARAN SESUAI WARNA</title>
  <style>
    body {
      display: flex;
      flex-direction: column; /* Mengatur agar konten mengalir dari atas ke bawah */
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background-color: #dfdfdf;
    }
    h1 {
      margin-bottom: 20px; /* Jarak antara judul dan konten */
      font-family: Arial, sans-serif; /* Font yang digunakan */
      color: #333; /* Warna teks */
    }
    .container {
      display: flex;
      justify-content: space-between;
      width: 80%;
      position: relative;
    }
    .circle {
      width: 70px;
      height: 70px;
      border-radius: 50%;
      cursor: pointer;
      transition: transform 0.2s, box-shadow 0.2s;
    }
    .circle.red { background-color: red; }
    .circle.blue { background-color: blue; }
    .circle.green { background-color: green; }
    .circle.yellow { background-color: yellow; }
    .circle.black { background-color: black; }
    .circle.active {
      transform: scale(1.2);
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }
    .left, .right {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }
    .line {
      position: absolute;
      height: 2px;
      transform-origin: left center;
      z-index: -1;
      transition: width 0.1s ease;
    }
  </style>
</head>
<body>
  <h1>MENGHUBUNGKAN WARNA LINGKARAN</h1> <!-- Judul ditambahkan di sini -->
  <div class="co">NAMA : <input type="text" value="" style="height: 40px; font-size: larger;"></div>

<div class="container">
  <div class="left">
    <div class="circle red" data-color="red" data-position="left"></div>
    <div class="circle blue" data-color="blue" data-position="left"></div>
    <div class="circle green" data-color="green" data-position="left"></div>
    <div class="circle yellow" data-color="yellow" data-position="left"></div>
    <div class="circle black" data-color="black" data-position="left"></div>
  </div>
  <div class="right">
      <div class="circle red" data-color="red" data-position="right"></div>
      <div class="circle blue" data-color="blue" data-position="right"></div>
      <div class="circle green" data-color="green" data-position="right"></div>
      <div class="circle yellow" data-color="yellow" data-position="right"></div>
      <div class="circle black" data-color="black" data-position="right"></div>
  </div>
</div>

<script>
  let selectedCircle = null;
  let activeLines = []; // Array untuk menyimpan garis yang terhubung

  document.querySelectorAll('.circle').forEach(circle => {
    circle.addEventListener('click', (event) => {
      const color = circle.getAttribute('data-color');
      const position = circle.getAttribute('data-position');

      if (position === 'left') {
        selectedCircle?.element.classList.remove('active');
        selectedCircle = { color, element: circle };
        circle.classList.add('active');
        
        createTempLine(event.clientX, event.clientY); // Buat garis penghubung sementara

        document.addEventListener('mousemove', followCursor);
      } else if (position === 'right' && selectedCircle) {
        if (selectedCircle.color === color) {
          addPermanentLine(circle); // Tambahkan garis permanen
        }
        selectedCircle.element.classList.remove('active');
        selectedCircle = null;
        document.removeEventListener('mousemove', followCursor);
        removeTempLine();
      }
    });
  });

  function createTempLine(x, y) {
    removeTempLine();
    let line = document.createElement('div');
    line.classList.add('line');
    line.style.backgroundColor = selectedCircle.color;
    line.style.left = `${x}px`;
    line.style.top = `${y}px`;
    line.dataset.temp = "true"; // Tandai sebagai garis sementara
    document.body.appendChild(line);
  }

  function removeTempLine() {
    const tempLine = document.querySelector('.line[data-temp="true"]');
    if (tempLine) tempLine.remove();
  }

  function followCursor(event) {
    const startRect = selectedCircle.element.getBoundingClientRect();
    const startX = startRect.left + startRect.width / 2;
    const startY = startRect.top + startRect.height / 2;
    const endX = event.clientX;
    const endY = event.clientY;
    const length = Math.hypot(endX - startX, endY - startY);
    const angle = Math.atan2(endY - startY, endX - startX) * (180 / Math.PI);

    const tempLine = document.querySelector('.line[data-temp="true"]');
    if (tempLine) {
      tempLine.style.width = `${length}px`;
      tempLine.style.transform = `rotate(${angle}deg)`;
      tempLine.style.left = `${startX}px`;
      tempLine.style.top = `${startY}px`;
    }
  }

  function addPermanentLine(targetElement) {
    const startRect = selectedCircle.element.getBoundingClientRect();
    const endRect = targetElement.getBoundingClientRect();

    const startX = startRect.left + startRect.width / 2;
    const startY = startRect.top + startRect.height / 2;
    const endX = endRect.left + endRect.width / 2;
    const endY = endRect.top + endRect.height / 2;

    const length = Math.hypot(endX - startX, endY - startY);
    const angle = Math.atan2(endY - startY, endX - startX) * (180 / Math.PI);

    const line = document.createElement('div');
    line.classList.add('line');
    line.style.backgroundColor = selectedCircle.color;
    line.style.width = `${length}px`;
    line.style.transform = `rotate(${angle}deg)`;
    line.style.left = `${startX}px`;
    line.style.top = `${startY}px`;

    activeLines.push(line);
    document.body.appendChild(line);
  }
</script>

</body>
</html>

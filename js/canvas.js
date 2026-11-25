
const canvas2 = document.getElementById("ods2");
const ctx2 = canvas2.getContext("2d");

ctx2.fillStyle = "#DDA63A";
ctx2.fillRect(0, 0, 1024, 1024);

ctx2.fillStyle = "#FFFFFF";
ctx2.font = 'bold 330px Impact, "Arial Narrow", sans-serif';
ctx2.fillText("2", 65, 285);

ctx2.font = 'bold 125px Impact, "Arial Narrow", sans-serif';
ctx2.fillText("HAMBRE", 265, 165, 650);
ctx2.fillText("CERO", 265, 290, 650);

ctx2.lineWidth = 43;
ctx2.lineCap = "round";
ctx2.lineJoin = "round";
ctx2.strokeStyle = "#FFFFFF";

ctx2.beginPath();
ctx2.moveTo(405, 615);
ctx2.bezierCurveTo(355, 555, 425, 510, 425, 455);
ctx2.bezierCurveTo(425, 425, 410, 405, 400, 390);
ctx2.stroke();

ctx2.beginPath();
ctx2.moveTo(535, 615);
ctx2.bezierCurveTo(485, 555, 555, 510, 555, 455);
ctx2.bezierCurveTo(555, 425, 540, 405, 530, 390);
ctx2.stroke();

ctx2.beginPath();
ctx2.moveTo(665, 615);
ctx2.bezierCurveTo(615, 555, 685, 510, 685, 455);
ctx2.bezierCurveTo(685, 425, 670, 405, 660, 390);
ctx2.stroke();

ctx2.beginPath();
ctx2.moveTo(225, 660);
ctx2.lineTo(799, 660);
ctx2.quadraticCurveTo(780, 825, 512, 900);
ctx2.quadraticCurveTo(245, 825, 225, 660);
ctx2.closePath();
ctx2.fill();

ctx2.beginPath();
ctx2.roundRect(450, 890, 124, 35, 8);
ctx2.fill();


const canvas12 = document.getElementById("ods12");
const ctx12 = canvas12.getContext("2d");

ctx12.fillStyle = "#BF8B2E";
ctx12.fillRect(0, 0, 1024, 1024);

ctx12.fillStyle = "#FFFFFF";
ctx12.font = 'bold 300px Impact, "Arial Narrow", sans-serif';
ctx12.fillText("12", 45, 285);

ctx12.font = 'bold 120px Impact, "Arial Narrow", sans-serif';
ctx12.fillText("PRODUCCIÓN", 320, 165, 660);
ctx12.fillText("Y CONSUMO", 320, 290, 660);
ctx12.fillText("RESPONSABLES", 320, 415, 680);

ctx12.strokeStyle = "#FFFFFF";
ctx12.lineWidth = 62;
ctx12.lineCap = "round";
ctx12.lineJoin = "round";

ctx12.beginPath();
ctx12.moveTo(205, 690);
ctx12.bezierCurveTo(205, 520, 400, 520, 512, 690);
ctx12.bezierCurveTo(624, 860, 819, 860, 819, 690);
ctx12.bezierCurveTo(819, 520, 624, 520, 512, 690);
ctx12.bezierCurveTo(400, 860, 205, 860, 205, 690);
ctx12.stroke();

ctx12.fillStyle = "#FFFFFF";
ctx12.beginPath();
ctx12.moveTo(465, 705);
ctx12.lineTo(480, 815);
ctx12.lineTo(405, 765);
ctx12.closePath();
ctx12.fill();

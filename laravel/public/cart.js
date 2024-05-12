// Lấy modal
var modal = document.getElementById("myModal");

// Lấy nút mở modal
var btn = document.getElementById("cart");
// Lấy phần tử đóng modal
var span = document.getElementsByClassName("close")[0];

var close_footer = document.getElementsByClassName("close-footer")[0];

// Khi người dùng bấm vào nút, mở modal
btn.onclick = function() {
    modal.style.display = "block";
}

// Khi người dùng bấm vào nút đóng (x), đóng modal
span.onclick = function() {
    modal.style.display = "none";
}
//khi bam vao nut dong
close_footer.onclick = function () {
    modal.style.display = "none";
}

// Khi người dùng bấm ra ngoài modal, đóng modal
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

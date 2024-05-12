// Lấy modal
var modal = document.getElementById("myModal");

// Lấy nút mở modal
var btn = document.getElementById("cart");
// Lấy phần tử đóng modal
var span = document.getElementsByClassName("close")[0];

var close_footer = document.getElementsByClassName("close-footer")[0];

// Khi người dùng bấm vào nút, mở modal
// Khai báo biến flag để theo dõi trạng thái của modal
var modalOpen = false;

// Thiết lập sự kiện click cho nút
btn.onclick = function() {
    // Nếu modal đang mở
    if (modalOpen) {
        modal.style.display = "none"; // Đóng modal
        modalOpen = false; // Cập nhật trạng thái modal
    } else {
        modal.style.display = "block"; // Mở modal
        modalOpen = true; // Cập nhật trạng thái modal
    }
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

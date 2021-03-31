const hotelName = document.getElementById('name');
const hotelAlamat = document.getElementById('alamat');
const searchKey = document.getElementById('search');
const SearchBtn = document.querySelector('.searchBtn');
SearchBtn.disabled = true;
searchKey.addEventListener('click', function (e) {
    e.target.addEventListener('keyup', function () {
        if (hotelName.value != "" || hotelAlamat.value != "") {
            SearchBtn.disabled = false;
        } else {
            SearchBtn.disabled = true;
        }
    });
});
const date = document.getElementById('date');
window.setTimeout(function () {
    let time = new Date();
    const bulan = [
        "Januari", "Februari", "Maret",
        "April", "Mei", "Juni",
        "Juli", "Agustus", "September",
        "Oktober", "November", "Desember"
    ];
    const hari = ["Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu", "Minggu"];
    date.innerHTML = hari[time.getDay() - 1] + ", " + time.getDate() + " " + bulan[(time.getMonth())] + " " + time.getFullYear();
}, 1000);

const har = document.querySelector('span .hari');
const bul = document.querySelector('span .bulan');
const tg = document.querySelector('.tanggal');
window.setTimeout(function () {
    let now = new Date();
    const bulan = [
        "Januari", "Februari", "Maret",
        "April", "Mei", "Juni",
        "Juli", "Agustus", "September",
        "Oktober", "November", "Desember"
    ];
    const hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
    tg.innerHTML = now.getDate();
    har.innerHTML = hari[now.getDay()];
    bul.innerHTML = bulan[now.getMonth()] + ", " + now.getFullYear();
}, 1000);
function preview(input, imgId) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(imgId).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}
<script type="text/javascript">
// 1 detik = 1000
window.setTimeout("waktu()",1000);  
function waktu() {   
var tanggal = new Date();  
setTimeout("waktu()",1000);  
document.getElementById("jam").innerHTML = harold(tanggal.getHours())+":"+harold(tanggal.getMinutes())+":"+harold(tanggal.getSeconds());
}
function harold(c) {
    if (c<10){
        c="0"+c;
    }
    return c;
}
</script>






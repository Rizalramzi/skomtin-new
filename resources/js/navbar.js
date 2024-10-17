// Profile Picture 
document.querySelectorAll('.profilePicture').forEach(function(profilePic) {
    profilePic.addEventListener('click', function() {
        // Ambil menu yang terkait dengan gambar profil yang diklik
        var profileMenu = this.nextElementSibling;
        
        // Cek apakah menu ini sudah terlihat atau belum
        var isMenuVisible = !profileMenu.classList.contains('hidden');

        // Tutup semua menu terlebih dahulu
        document.querySelectorAll('.profileMenu').forEach(function(menu) {
            menu.classList.add('hidden');
        });

        // Jika menu tidak terlihat, tampilkan menu untuk gambar profil yang diklik
        if (!isMenuVisible) {
            profileMenu.classList.remove('hidden');
        }
    });
});

// Event listener untuk menutup menu saat klik di luar
window.addEventListener('click', function(e) {
    if (!e.target.matches('.profilePicture') && !e.target.closest('.profileMenu')) {
        document.querySelectorAll('.profileMenu').forEach(function(menu) {
            menu.classList.add('hidden');
        });
    }
});

// End Profile Picture
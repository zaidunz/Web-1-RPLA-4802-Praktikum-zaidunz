function buatPost() {
    var content = document.getElementById("content").value;
    if (content.trim() === "") {
        alert("Konten tidak boleh kosong!");
        return;
    }
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "submitpost.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            ambilPost();
            document.getElementById("content").value = "";
        }
    };
    xhr.send("content=" + encodeURIComponent(content));  
}

function ambilPost() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "getpost.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("post-content").innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}

function hapusPost(id) {
    if (confirm('Yakin ingin menghapus post ini?')) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "deletepost.php?id=" + encodeURIComponent(id), true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                alert(xhr.responseText);
                ambilPost(); // Refresh posts
            }
        };
        xhr.send();
    }
}

function likePost(id) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "likepost.php?id=" + encodeURIComponent(id), true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            ambilPost();
        }
    };
    xhr.send();
}

function unlikePost(id) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "unlikepost.php?id=" + encodeURIComponent(id), true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            ambilPost();
        }
    };
    xhr.send();
    
}

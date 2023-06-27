const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})
});




// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})







const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
	if(window.innerWidth < 576) {
		e.preventDefault();
		searchForm.classList.toggle('show');
		if(searchForm.classList.contains('show')) {
			searchButtonIcon.classList.replace('bx-search', 'bx-x');
		} else {
			searchButtonIcon.classList.replace('bx-x', 'bx-search');
		}
	}
})





if(window.innerWidth < 768) {
	sidebar.classList.add('hide');
} else if(window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bx-x', 'bx-search');
	searchForm.classList.remove('show');
}


window.addEventListener('resize', function () {
	if(this.innerWidth > 576) {
		searchButtonIcon.classList.replace('bx-x', 'bx-search');
		searchForm.classList.remove('show');
	}
})



const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function () {
	if(this.checked) {
		document.body.classList.add('dark');
	} else {
		document.body.classList.remove('dark');
	}
})

// function logout() {
// 	// Perform any necessary logout actions here
// 	// For example, clearing session data or redirecting to a login page
	
// 	// Reload the current page after logout
// 	location.reload();
// }

//     // Fungsi untuk menampilkan pop-up
//     function showPopup() {
//         document.getElementById("search-popup").style.display = "block";
//     }

//     // Fungsi untuk menyembunyikan pop-up
//     function hidePopup() {
//         document.getElementById("search-popup").style.display = "none";
//     }

//     // Fungsi untuk mengirim permintaan pencarian ke search1.php
//     function search() {
//         var searchQuery = document.getElementsByName("search_query")[0].value;
//         var xhttp = new XMLHttpRequest();

//         xhttp.onreadystatechange = function() {
//             if (this.readyState == 4 && this.status == 200) {
//                 document.getElementById("search-results").innerHTML = this.responseText;
//                 showPopup();
//             }
//         };

//         xhttp.open("POST", "search4.php", true);
//         xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//         xhttp.send("search_query=" + searchQuery);
//     }

//     // Tambahkan event listener untuk tombol pencarian
//     document.getElementsByClassName("search-btn")[0].addEventListener("click", search);

//     // Tambahkan event listener untuk tombol tutup pada pop-up
//     document.getElementsByClassName("close-btn")[0].addEventListener("click", hidePopup);

	
// 	function exportToExcel() {
// 		const table = document.getElementById("data-table");
// 		const rows = Array.from(table.getElementsByTagName("tr"));
// 		const csvContent = rows.map(row => Array.from(row.getElementsByTagName("td")).map(cell => cell.innerText)).join("\n");

// 		const blob = new Blob([csvContent], {
// 			type: "text/csv;charset=utf-8;"
// 		});

// 		const link = document.createElement("a");
// 		const url = URL.createObjectURL(blob);
// 		link.setAttribute("href", url);
// 		link.setAttribute("download", "penyaluran_beras.csv");
// 		link.style.visibility = 'hidden';
// 		document.body.appendChild(link);
// 		link.click();
// 		document.body.removeChild(link);
// 	}
	
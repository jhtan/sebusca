(function() {
	// getElementById
	function $id(id) {
		return document.getElementById(id);
	}
	// output information
	function Output(msg) {
		var m = $id("messages");
		m.innerHTML = msg + m.innerHTML;
	}
	// file drag hover
	function FileDragHover(e) {
		e.stopPropagation();
		e.preventDefault();
		e.target.className = (e.type == "dragover" ? "hover" : "");
	}
	// file selection
	function FileSelectHandler(e) {
		FileDragHover(e);
		// fetch FileList object
		var files = e.target.files || e.dataTransfer.files;
		// process all File objects
		for (var i = 0, f; f = files[i]; i++) {
			//metodo
			ParseFile(f);
		}
	}
	function ParseFile(file) {
		Output(
			"<p>File information: <strong>" + file.name +
			"</strong> type: <strong>" + file.type +
			"</strong> size: <strong>" + file.size +
			"</strong> bytes</p>"
		);
		if (file.type.indexOf("image") == 0) {
			var reader = new FileReader();
			reader.onload = function(e) {
			Output(
				"<p><strong>" + file.name + ":</strong><br />" +
				'<img class="photo" src="' + e.target.result + '" /></p>');
			}
		reader.readAsDataURL(file);
		}else{
			var reader = new FileReader();
			reader.onload = function(e) {
				var l=e.target.result;
				var ii=(l.indexOf("<script id=\"data-objects\">"));
				var ff=(l.indexOf("window.Sliders = [];"));
				var r=l.substring(ii+137,ff-14);
				if ($('#output').text().length==1) {
					var s=$('#output').text().substring(0,$('#output').text().length);
				} else{
					var s=$('#output').text().substring(0,$('#output').text().length-1);
				};

			}
			reader.readAsText(file);
		}
	}
	function Init() {
		var fileselect = $id("image"), filedrag = $id("filedrag"), submitbutton = $id("submitbutton");
		fileselect.addEventListener("change", FileSelectHandler, false);
		var xhr = new XMLHttpRequest();
		if (xhr.upload) {
			filedrag.addEventListener("dragover", FileDragHover, false);
			filedrag.addEventListener("dragleave", FileDragHover, false);
			filedrag.addEventListener("drop", FileSelectHandler, false);
			filedrag.style.display = "block";
			//submitbutton.style.display = "block";
		}
	}
	if (window.File && window.FileList && window.FileReader) {
		Init();
	}
})();
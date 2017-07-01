<?php

$path = "Files/"; // Upload directory
echo '<div id="Upload-Box">';


# Nuker Start
if( isset($_POST["del-files"])) {
	foreach ($_POST['del-files'] as $dfile) {
		unlink($path.$dfile);
	}
}
# Nuker End
?>
<script>
	function _(el){
		return document.getElementById(el);
	}
	function uploadFile(){
		var file = _("files").files;

		_("barHide").setAttribute("style", "display: ;");
		for (i = 0; i < file.length; i++){
			var formdata = new FormData();
			formdata.append("files", file[i]);

			pTitleRename(file[i]["name"]);

			var ajax = new XMLHttpRequest();
			ajax.upload.addEventListener("progress", progressHandler, false);
			ajax.addEventListener("load", completeHandler, false);
			ajax.addEventListener("error", errorHandler, false);
			ajax.addEventListener("abort", abortHandler, false);
			ajax.open("POST", "FileParser.php");
			ajax.send(formdata);
		}

	}
	function progressHandler(event){
		var percent = (event.loaded / event.total) * 100;
		_("progressBar").setAttribute("style", "width:"+Math.round(percent)+"%");
		_("status").innerHTML = Math.round(percent)+"%";
	}
	function completeHandler(event){
		_("status").innerHTML = event.target.responseText;
		_("progressBar").value = 0;
		fileRefresh();

	}
	function errorHandler(event){
		_("status").innerHTML = "Upload Failed";
	}
	function abortHandler(event){
		_("status").innerHTML = "Upload Aborted";
	}
	function fileRefresh() {
		$("#Filebrowser").load("index.php #Filebrowser");
	}
	function pTitleRename(curntFile){
		_("file").innerHTML = curntFile;
	}


</script>


<form id="upload_form" enctype="multipart/form-data" method="post">
	<input type="file" name="file" id="files" multiple="multiple"><br>
	<div  id="barHide" class="skillbar clearfix" style="display: none;">
		<div class="skillbar-title" style="background: #00a8ff;"><span id="file"></span></div>
		<div id="progressBar" class="skillbar-bar" "></div>
		<div id="status" class="skill-bar-percent"></div>
	</div>
	<input type="button" value="Upload File" onclick="uploadFile()">
</div>


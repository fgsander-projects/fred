<?php if(!isset($this)) die("You can't call this file directly."); ?>
<link href="hooks/dropzone/dropzone.min.css" rel="stylesheet">
<div class="clearfix"></div>
<div> 
	<div id="response"></div>
        <div  id="my-awesome-dropzone" class="dropzone" style ="height: auto; margin: 0px">
            <div class="dz-default dz-message" style="height: auto; margin-top: 0px; margin-bottom: 0px">
                <h4 style="margin-top: 15px">
				<i class="glyphicon glyphicon-upload text-primary"></i>
				<br>Arrastre e solte os arquivos para iniciar o envio<br>
				<small>ou clique aqui para escolher manualmente.</small>			
			</h4>
		</div>
	</div>
</div>
<div class="clearfix"></div>
<style>
	.dropzone {
	    border: 3px dashed darkblue;
            min-height: 100px;
            -webkit-border-radius: 30px;
            border-radius: 30px;
            background: rgba(50, 50, 50, 0.06);
            padding: 10px;
            margin: 0px;
	}
        .dz-message .dz-default{
            display:none;
        }
</style>
<script src="hooks/dropzone/dropzone.min.js"></script>
<script type="text/javascript">// Immediately after the js include
  Dropzone.autoDiscover = false;
</script>
<script>
        
        var ext = "." + '<?php echo $this->extensions_img."|".$this->extensions_mov."|".$this->extensions_docs."|".$this->extensions_audio; ?>';
        ext = ext.replace (/\|/g,",.");
        
	$j("div#my-awesome-dropzone").dropzone({
	  paramName: "uploadedFile", // The name that will be used to transfer the file
          maxFilesize: 200048,
	  url: "hooks/multipleUpload/upload-ajax.php?f=" + "<?php echo $this->folder; ?>",
	  acceptedFiles: ext,
	  uploadMultiple: false,
	  accept: function(file, done) {
                    done();
	  },
	  init: function() {
                        this.on("success", function(file, response) {
                                            $j(".dropzone").css( "border" ,"3px dotted blue");
                                            var b = response;
                                            response = JSON.parse(response);
                                            if ( response["response-type"] === "success"){
                                                    var successDiv = $j("<div>", {class: "alert alert-success" , style: "display: none; padding-top: 6px; padding-bottom: 6px;"});
                                                    var successMsg = "Arquivo enviado com sucesso."+(response.isRenamed?"<br>O nome deste arquivo já foi usado anterioremente, ele foi renomeado para: "+response.fileName+".":"");

                                            //function in upload.js
                                                    jsonImages(b);
                                            ////////////////////////////////

                                                    successDiv.html( successMsg );
                                                    $j("#response").html(successDiv);
                                                    setTimeout( deleteFile, 2000 , file , this);
                                            }
                        });
                        this.on("queuecomplete", function(file, reponse) {
                            //ubdate item after finish upload.
                            setTimeout(function(){
                                if (is_add_new()){
                                   $j('#insert').trigger( "click" ); 
                                }else{
                                   $j('#update').trigger( "click" ); 
                                }
                            },2000);
                                
                        });
			this.on("error", function(file, response){
				if($j.type(response) === "string"){
					response = "Você precisa enviar um arquivo válido: " + response; //dropzone sends it's own error messages in string
				}else{
					response = response['error'];
				}
					
				$j("#response").html("<div class='alert alert-danger'>"+response+"</div>");
				$j(".dropzone").css( "border" ,"3px dotted red");
				
				setTimeout( deleteFile, 4000 , file , this);
			});
      }
	})
  	function deleteFile (file , elm){
			elm.removeFile(file);
	}
</script>

<script type="text/javascript">


$('#coverImage').on('hidden.bs.modal', function (e) {
  $('#cover').css('display', 'none');
});
$('#profileImage').on('hidden.bs.modal', function (e) {
  $('#logoError').css('display', 'none');
});

          Dropzone.options.coverUpload = { 
            acceptedFiles: ".png,.jpg,.jpeg",
            maxFilesize: 1,
            method:"post",
            url:"{{route('company.changeCover',$user->id)}}",
          
           
            accept:function(file, done){
file.upload.filename=new Date().getTime() +file.upload.filename;

done();
},
        
            init: function() {
            
        this.on("addedfile", function(file) {
          $('#cover').css('display', 'none');
          if(file.size>1048576){
              this.removeFile(file);
            
              
              $('#cover').css('display', 'block');
      var str1 = "file is too big ";

      var res = str1.concat(Math.round(file.size/1024/10.24)/100).concat(" mb ").concat(" .max file size is 1Mb");
      $('#cover').text(res);
          }
          if ($.inArray(file.type, ['image/jpeg', 'image/jpg', 'image/png']) == -1) {
            this.removeFile(file);
            $('#cover').css('display', 'block');
            var res=this.options.dictInvalidFileType+" . accepted files are jpg,jpeg and png."
            $('#cover').text(res);
                          }
                        
        
      
          
      });

      this.on("sending", function(file, xhr, formData) {
        
          formData.append("_token",$( "input[type=hidden][name=_token]" ).val());
         
      });
      this.on("success", function(file, response) {
      $('#coverImage').modal('hide');
      this.removeFile(file);
        
          var url="{{asset('/images/cover/')}}"+("/");
          
          $("#coverImg").attr("src", url+ file.upload.filename );
         


            });
            }
    };
Dropzone.options.profileUpload = { 
            acceptedFiles: ".png,.jpg,.jpeg",
            maxFilesize: 1,
            method:"post",
            url:"{{route('company.changeLogo',$user->id)}}",
            accept:function(file, done){
file.upload.filename=new Date().getTime() +file.upload.filename;
done();
},
        
    
        
            init: function() {
            
        this.on("addedfile", function(file) {
          $('#logoError').css('display', 'none');
          if(file.size>1048576){
              this.removeFile(file);
            
              
              $('#logoError').css('display', 'block');
      var str1 = "file is too big ";

      var res = str1.concat(Math.round(file.size/1024/10.24)/100).concat(" mb ").concat(" .max file size is 1Mb");
      $('#logoError').text(res);
          }
          if ($.inArray(file.type, ['image/jpeg', 'image/jpg', 'image/png']) == -1) {
            this.removeFile(file);
            $('#logoError').css('display', 'block');
            var res=this.options.dictInvalidFileType+" . accepted files are jpg,jpeg and png."
            $('#logoError').text(res);
                          }
          
      });

      this.on("sending", function(file, xhr, formData) {
          formData.append("_token",$( "input[type=hidden][name=_token]" ).val());
      });
      this.on("success", function(file, response) {
      $('#profileImage').modal('hide');
      this.removeFile(file);
        
          var url="{{asset('/images/logo/')}}"+("/");
          
          $("#logoImg").attr("src", url+ file.upload.filename );
          
          $("#avatar").attr("src", url+ file.upload.filename);
          });


            }
    }
  
  
</script>
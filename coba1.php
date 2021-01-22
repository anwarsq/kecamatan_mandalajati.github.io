<div class="crcform">
        <h1>Internship Details</h1>
        <form id="internship_details">
            <table class="table table-bordered" id="dynamic_field">
                <tr>
                    <td>
                        <!--div class="top-row"-->
                        <div class="field-wrap">
                            <label>
                                Company<span class="req">*</span>
                            </label>
                            <input type="text" required autocomplete="off" name="company[]"/>
                        </div>

                        <div class="field-wrap">
                            <label>
                                Project<span class="req">*</span>
                            </label>
                            <input type="text"required autocomplete="off" name="project[]"/>
                        </div>

                        <div class="field-wrap">
                            <label>
                                Duration<span class="req">*</span>
                            </label>
                            <input type="text"required autocomplete="off" name="duration[]"/>
                        </div>

                        <div class="field-wrap">
                            <label>
                                Key Learning<span class="req">*</span>
                            </label>
                            <input type="text"required autocomplete="off" name="key_learning[]"/>
                        </div>
                    </td>
                    <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                </tr>
            </table>
            <input type="button" name="submit" id="submit"  class="btn btn-info" value="Submit" />
        </form>
    </div>
    <script>
        $(document).ready(function(){
            var i = 1;
            $('#add').click(function(){
                i++;
                $('#dynamic_field').append('<tr id="row'+i+'"><td><div class="field-wrap"><label>Company<span class="req">*</span></label><input type="text" required autocomplete="off" name="company[]"/></div><div class="field-wrap"><label>Project<span class="req">*</span></label><input type="text"required autocomplete="off" name="project[]"/></div><div class="field-wrap"><label>Duration<span class="req">*</span></label><input type="text" required autocomplete="off" name="duration[]"/></div><div class="field-wrap"><label>Key Learning<span class="req">*</span></label><input type="text" required autocomplete="off" name="key_learning[]"/></div></td></td><td><button name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
            });

            $(document).on('click','.btn_remove', function(){
                var button_id = $(this).attr("id");
                $("#row"+button_id+"").remove();
            });

            $('#submit').click(function(){
                $.ajax({
                    async: true,
                    url: "internship_details.php",
                    method: "POST",
                    data: $('#internship_details').serialize(),
                    success:function(rt)
                    {
                        alert(rt);
                        $('#internship_details')[0].reset();
                    }
                });
            });
        });
    </script>


    <!-- v2 -->
    <div class="field_wrapper">
    <div>
        <label for="field_name[]">Kepala Keluarga :</label>
        <input type="text" name="field_name[]" value=""/>
        <a style="margin-left:10px" id='add_button' data-toggle='modal'>
            <button style='border-radius:8px; height:30px;' class='btn btn-primary btn-xs'><i class='fa fa-plus'></i></button>
            </a>
        <!-- <a class="add_button" title="Add field"><img style="height:20px;" src="./img/plus.png"/></a> -->
    </div>
</div>

<script type="text/javascript">
    $(document).on("click", "#add_button", function() {
    // alert("hello");
    var maxField = 50; //Input fields increment limitation
    var addButton = $('#add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var x = 1; //Initial field counter is 1

    if(x<maxField){
        var fieldHTML = '<div><label for="field_name[]">Anggota ' +x+ ' :</label><input type="text" name="field_name[]" value=""/><a style="margin-left:10px" id="remove_button" data-toggle="modal"><button style="border-radius:8px; height:30px;" class="btn btn-primary btn-xs"><i class="fa fa-minus"></i></button></a></div>'; //New input field html 
        x+=;
    }
    
    
    //Once add button is clicked
    // $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    // });
    
    //Once remove button is clicked
    $(wrapper).on('click', '#remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
   
})
    </script>
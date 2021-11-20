<script> var data_form = {}; var del_form = false; var del_user = false; </script>

<div class="right_col" role="main">
<div class="container-fluid" style="background-color: black;position: absolute;width: 100%;height: 100%;background-color: rgba(50,50,50,0.8);z-index: 3;position: fixed;display: none;" id="theme_form">
    <div class="row " style="height: 100%;">
        <div class="col-md-6 mx-auto my-auto" style="height: 50%;background-image: url('<?= base_url('assets/img/abstract2.jpg');?>');background-size: 100%" id="fofo">
            <div class="row " style="height: 17%;font-family: 'Helvetica Neue';">

                <div class="col-md-12" style="text-align: center;z-index: 5">
                    <button type="button" class="close" aria-label="Close" style="float: right;font-size: 30px;color: white" id="close_form">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <br>
                    <h1 style="color: white" id="theme_title">Selecciona el Tema</h1>

                </div>
            </div>

            <div class="row mt-3" style="height: 70%;z-index: 0" id="imgT">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="width: 100%" align="center">
                    <div class="carousel-inner">
                    
                    <div class="carousel-item active">
                            <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="<?= base_url('assets/img/double-bubble-dark.png');?>" alt="Card image cap" height="170" >
                            <div class="card-body">
                            <button class="btn btn-dark" id="dark_theme">
                                Tema Oscuro
                            </button>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="<?= base_url('assets/img/double-bubble.png');?>" alt="Card image cap" height="170" >
                            <div class="card-body">
                            <button class="btn btn-primary" id="light_theme" disabled>
                                Tema Ligero
                            </button>
                            </div>
                        </div>
                    </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previo</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Siguiente</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" id="main" style="background-image: url('<?= base_url('assets/img/double-bubble.png');?>');">
    <div class="row justify-content-center mainR" style="height: 65vh;min-height: 150px; padding: 0.1px;">
        <div class="col-md-4"> 
            <form id="sub-img" method="post" enctype="multipart/form-data">
                <input type="file" name="userfile" id="my_file" style="display: none;" />
            </form>
            <script> 
                $(document).ready(function(){
                    $('#my_file').change(function(){
                        //e.preventDefault();
                        let d = new FormData( $('#sub-img')[0]  );
                        //console.log(d);
                        $.ajax({
                            url:'<?= site_url('surveys/upload_image'); ?>' ,
                            method:'POST',  
                            data:d,
                            contentType:false,
                            cache:false,
                            processData:false,
                            success:function(data){
                                let img = $.parseJSON(data);
                                $('#proj_img').attr('src' , `<?= base_url('assets/img/uploads/surveys/'); ?>${img['file_name']}` );
                            },
                            error:function(xhr,status,error){
                                console.log(xhr);
                                console.log(status);
                                console.log(error);
                            }
                        });
                    });
                });
            </script>
        </div>
        <div class="col-md-4"id="test">

            <div class="group" style="margin-top: 18vh;" >
                <input type="text" id="title_input" class="shadow" maxlength="30" required> <!-- Title Input -->
                <span class="highlight"></span>
                <span class="bar"></span>
                <label id="title_label"> Título de la Encuesta </label>
            </div>
            <div class="group" style="margin-top: 5vh;" >
                <input type="text" id="objective_input" class="shadow" maxlength="100" required> <!-- Title Input -->
                <span class="highlight"></span>
                <span class="bar"></span>
                <label id="objective_label"> Objetivo de la Encuesta </label>
            </div>
            <div class="group" style="margin-top: 5vh;" >
                <input type="text" id="description_input" class="shadow" maxlength="250" required> <!-- Title Input -->
                <span class="highlight"></span>
                <span class="bar"></span>
                <label id="description_label"> Descripción de la Encuesta </label>
            </div>
        </div>
        <div class="col-md-4" style="height: 100%;" align="center" id="test2">
            <img src="<?= base_url('assets/img/survTheme.png');?>" class="shadow" height="100" width="100" style="background-color: rgb(244,244,244);border-radius: 100%;margin-top: 15vh;cursor: pointer;" id="theme">
        </div>
    </div>
</div>

<div id="container_add" style="position: fixed;z-index: 2">
    <input type="checkbox" id="menu-toggle"/>
    <label for="menu-toggle" id="add_label">
        <i class="fas fa-plus" id="open"></i>
    </label>
    <ul id="menu" style="top:20px;">
        <li><a href="#bottom" id="MCQ" class="Q"><i class="far fa-dot-circle" style="color: #007bff"></i> MCQ</a></li>
        <li><a href="#bottom" id="CXQ" class="Q"><i class="far fa-check-square" style="color: #007bff"></i> Checkbox</a></li>
        <li><a href="#bottom" id="OQ" class="Q"><i class="fas fa-question" style="color: #007bff"></i> Abierta</a></li>
        <li><a href="#bottom" id="DATEQ" class="Q"><i class="far fa-calendar-alt" style="color: #007bff"></i> Fecha</a></li>
        <li><a href="#bottom" id="TIMEQ" class="Q"><i class="far fa-clock" style="color: #007bff"></i> Tiempo</a></li>
        <li><a href="#bottom" id="RANGEQ" class="Q"><i class="fas fa-ruler-horizontal" style="color: #007bff"></i> Rango</a></li>
        <!-- Add Matrix --> 
    </ul>
</div>
<div id="messages" class="alert" style="display:none;text-align: center;">
    
</div>
<div id="question_container">

</div>
<div id="bottom"></div>


<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-chevron-up"></i></button>

<footer >
    <button id="send" class="btn btn-success">
        Enviar <i class='fas fa-paper-plane'></i> <!-- Store it + Ajax email sending -->
    </button>
    
    <?php if( $this->session->userdata('logged_in') ): ?>
        <a id='save'>
            <button class="btn btn-info" style="font-size: 20px;font-weight: bold;">
                    Guardar <i class="fas fa-cloud-download-alt"></i> <!-- On Click submit surveys/store -->
            </button>
        </a>
    <?php endif; ?>
</footer>
</div>



<script type="text/javascript" src="<?= base_url('assets/js/tagsinput.js');?>"></script>

<script>
    /* THEME SELECTION */
    $("#dark_theme").click(function(){
        $("#main").css("background-image", "url('<?= base_url('assets/img/double-bubble-dark.png');?>')");

        $("body").animate({
            backgroundColor: '#212121',
            color: '#fff' //'rgb(200,200,200)',
        });
        $("#dark_theme").attr("disabled", true);

        $("#light_theme").attr("disabled", false);

    })

    $("#light_theme").click(function(){

        $("#main").css("background-image", "url('<?= base_url('assets/img/double-bubble.png');?>')");

        $("body").animate({
            backgroundColor: 'rgb(244,244,244)',
            color: '#212121'
        });
        $("#dark_theme").attr("disabled", false);

        $("#light_theme").attr("disabled", true);

    });
</script>


<?php if( $this->session->userdata('logged_in') ): ?>
<script>
$(document).ready(function(){
    var id;
    $('#send').click(function(){
        if (del_form == false)
        {
            data = {};
            data[0] = [$('#title_input').val(), $('#description_input').val(), $('#objective_input').val()];
            $.each(questions , function(key,value){
                data[key] = [];
                $.each(value , function(k , v){
                    let el = $(`#${v}`);
                    data[key].push( el.val() );
                })
                data[key][0] = questions[key][0];
                data[key][2] = $(`#${questions[key][2]}`).is(':checked');
            });
            $.ajax({
                method:'POST',
                url:'<?= site_url('surveys/create_survey'); ?>',
                dataType:'json',
                data : {
                    data : data,
                    check : false,
                    img:$('#proj_img').attr('src')
                },
                success : function(data){
                    if ( data['error'] == true){
                        if (data['empty']){
                            $('#messages').css('display' , 'block');
                            $('#messages').removeClass('alert-success').addClass('alert-danger')
                            $('#messages').text('Por favor ingrese al menos una pregunta');
                            window.location.href = '#title_label';
                        }
                        else if ( data['double'] ){
                            $('input').css('border-bottom' , '1px solid #757575');
                            console.log(questions);console.log(data['double']);
                            $.each(data['double'] , function(k,v){
                                el = ( questions[v[0]][1] );
                                $(`#${el}`).css('border-bottom' , '1px solid red');
                                el = ( questions[v[1]][1] );
                                $(`#${el}`).css('border-bottom' , '1px solid red');
                            });
                            $('#messages').css('display' , 'block');
                            $('#messages').removeClass('alert-success').addClass('alert-danger')
                            $('#messages').text('La misma pregunta se repite dos veces o más !');
                            window.location.href = '#title_label';
                        }
                        else{ 
                            $('input').css('border-bottom' , '1px solid #757575');
                            let title = '';
                            $.each( data['indexes'] , function(k,v){
                                let el;
                                if ( v[0] == 0 && v[1] == 0 )
                                    title = ' | Por favor establezca un título !';
                                else 
                                    el = ( questions[v[0]][v[1]] );
                                
                                $(`#${el}`).css('border-bottom' , '1px solid red');
                            });
                            $('#messages').css('display' , 'block');
                            $('#messages').removeClass('alert-success').addClass('alert-danger')
                            $('#messages').text('Hay campos vacios'+title);
                            window.location.href = '#title_label';
                        }
                    }
                    else{
                        $('input').css('border-bottom' , '1px solid #757575');
                        $('#messages').css('display' , 'none');
                        id = data['id'];
                        var uuid = data['uuid'];
                        $('#link').val(`<?=$url;?>/answer-survey/${uuid}`);
                        del_form = true;
                        $("#login_form").fadeIn(500);
                    }
                },
                error : function(xhr,status,error){
                    $('#messages').css('display' , 'block');
                    $('#messages').removeClass('alert-success').addClass('alert-danger')
                    $('#messages').text('Ha habido un error');
                }
            });
        }
        else{
            $("#login_form").fadeIn(500);
        }
        
    });
});
</script>

<script>
$(document).ready(function(){
    $('#save button').click(function(){
        if (del_form == false)
        {
            data = {};
            data[0] = [$('#title_input').val(), $('#description_input').val(), $('#objective_input').val()];
            $.each(questions , function(key,value){
                data[key] = [];
                $.each(value , function(k , v){
                    let el = $(`#${v}`);
                    data[key].push( el.val() );
                })
                data[key][0] = questions[key][0];
                data[key][2] = $(`#${questions[key][2]}`).is(':checked');
            });            
            console.log(data);
            $.ajax({
                method:'POST',
                url:'<?= site_url('surveys/create_survey'); ?>',
                dataType:'json',
                data : {
                    data : data,
                    check : false,
                    img:$('#proj_img').attr('src')
                },
                success : function(data){
                    if ( data['error'] == true){
                        if (data['empty']){
                            $('#messages').css('display' , 'block');
                            $('#messages').removeClass('alert-success').addClass('alert-danger')
                            $('#messages').text('Por favor ingrese al menos una pregunta');
                            window.location.href = '#title_label';
                        }
                        else if ( data['double'] ){
                            $('input').css('border-bottom' , '1px solid #757575');
                            console.log(questions);console.log(data['double']);
                            $.each(data['double'] , function(k,v){
                                el = ( questions[v[0]][1] );
                                $(`#${el}`).css('border-bottom' , '1px solid red');
                                el = ( questions[v[1]][1] );
                                $(`#${el}`).css('border-bottom' , '1px solid red');
                            });
                            $('#messages').css('display' , 'block');
                            $('#messages').removeClass('alert-success').addClass('alert-danger')
                            $('#messages').text('La misma pregunta se repite dos veces o más or more !');
                            window.location.href = '#title_label';
                        }
                        else{ 
                            $('input').css('border-bottom' , '1px solid #757575');
                            let title = '';
                            $.each( data['indexes'] , function(k,v){
                                let el;
                                if ( v[0] == 0 && v[1] == 0 )
                                    title = ' | Por favor establezca un título !';
                                else 
                                    el = ( questions[v[0]][v[1]] );
                                
                                $(`#${el}`).css('border-bottom' , '1px solid red');
                            });
                            $('#messages').css('display' , 'block');
                            $('#messages').removeClass('alert-success').addClass('alert-danger')
                            $('#messages').text('Hay campos vacios'+title);
                            window.location.href = '#title_label';
                        }
                    }
                    else{
                        $('input').css('border-bottom' , '1px solid #757575');
                        $('#messages').css('display' , 'block');
                        $('#messages').removeClass('alert-danger').addClass('alert-success')
                        $('#messages').text('Encuesta creada con éxito !');
                        window.location.href = '#title_label';
                        window.location.replace( '<?=$url;?>/dashboard' );
                    }
                },
                error : function(xhr,status,error){
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                    $('#messages').css('display' , 'block');
                    $('#messages').removeClass('alert-success').addClass('alert-danger')
                    $('#messages').text('Ha habido un problema');
                }
            });
            
        }
        else 
            window.location.replace( '<?=$url;?>/dashboard' );
    });
});

</script>

<?php else : ?>

<script>
$(document).ready(function(){
    $('#send').click(function(){
        data_form = {};
        data_form[0] = [$('#title_input').val(), $('#description_input').val(), $('#objective_input').val()];
        $.each(questions , function(key,value){
            data_form[key] = [];
            $.each(value , function(k , v){
                let el = $(`#${v}`);
                data_form[key].push( el.val() );
            })
            data_form[key][0] = questions[key][0];
            data_form[key][2] = $(`#${questions[key][2]}`).is(':checked');
        });
        $.ajax({
            method:'POST',
            url:'<?= site_url('surveys/create_survey'); ?>',
            dataType:'json',
            data : {
                data : data_form,
                check_error : true,
                img : $('#proj_img').attr('src')
            },
            success : function(data){
                if ( data['error'] == true){
                    if (data['empty']){
                        $('#messages').css('display' , 'block');
                        $('#messages').removeClass('alert-success').addClass('alert-danger')
                        $('#messages').text('Por favor ingrese al menos una pregunta');
                        window.location.href = '#title_label';
                    }
                    else if ( data['double'] ){
                        $('input').css('border-bottom' , '1px solid #757575');
                        console.log(questions);console.log(data['double']);
                        $.each(data['double'] , function(k,v){
                            el = ( questions[v[0]][1] );
                            $(`#${el}`).css('border-bottom' , '1px solid red');
                            el = ( questions[v[1]][1] );
                            $(`#${el}`).css('border-bottom' , '1px solid red');
                        });
                        $('#messages').css('display' , 'block');
                        $('#messages').removeClass('alert-success').addClass('alert-danger')
                        $('#messages').text('La misma pregunta se repite dos veces o más !');
                        window.location.href = '#title_label';
                    }
                    else{ 
                        $('input').css('border-bottom' , '1px solid #757575');
                        let title = '';
                        $.each( data['indexes'] , function(k,v){
                            let el;
                            if ( v[0] == 0 && v[1] == 0 )
                                title = ' | Por favor establezca un título !';
                            else 
                                el = ( questions[v[0]][v[1]] );
                            
                            $(`#${el}`).css('border-bottom' , '1px solid red');
                        });
                        $('#messages').css('display' , 'block');
                        $('#messages').removeClass('alert-success').addClass('alert-danger')
                        $('#messages').text('Hay campos vacios'+title);
                        window.location.href = '#title_label';
                    }
                }
                else{
                    $('input').css('border-bottom' , '1px solid #757575');
                    $('#messages').css('display' , 'none');
                    $("#login_form").fadeIn(500);
                }
            },
            error : function(xhr,status,error){
                $('#messages').css('display' , 'block');
                $('#messages').removeClass('alert-success').addClass('alert-danger')
                $('#messages').text('Ha habido un problema');
            }
        });
    });
});
</script>


<?php endif; ?>


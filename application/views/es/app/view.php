<div class="right_col" role="main">
<div class="container-fluid">
    <div class="row justify-content-center mt-3 p-1" style="height: 150%;">
        <div class="col-lg-6 col-md-8 my-auto" align="center">
            <button class="btn btn-info switch_menu" id="survey">
                 Editar Encuesta
            </button>
            <button class="btn btn-primary switch_menu" id="summary">
                Resumen
            </button>
            <button class="btn btn-success switch_menu" id="answers">
                Respuestas
            </button>
        </div>
    </div>
</div>



<div style="display: none;" id="survey_container">

    <div class="container-fluid" style="background-color: black;position: absolute;width: 100%;height: 100%;background-color: rgba(50,50,50,0.8);z-index: 3;position: fixed;display: none;" id="theme_form">
        <div class="row " style="height: 100%;">
            <div class="col-md-6 mx-auto my-auto" style="height: 50%;background-image: url('<?= base_url('assets/img/abstract2.jpg');?>');background-size: 100%;margin-top:15vh !important" id="fofo">
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
                    <div id="carouselExampleControls" class="carousel carousel-dark slide" data-ride="carousel" style="width: 100%" align="center">
                        <div class="carousel-inner">
                        
                        <div class="carousel-item active">
                                <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="<?= base_url('assets/img/dark.jpg');?>" alt="Card image cap" height="170" >
                                <div class="card-body">
                                <button class="btn btn-dark" id="dark_theme">
                                    Tema Oscuro
                                </button>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="<?= base_url('assets/img/form_background.jpg');?>" alt="Card image cap" height="170" >
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
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next" >
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Siguiente</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="main" style="background-image: url('<?= base_url('assets/img/double-bubble.png');?>');">
    <div class="row justify-content-center mainR" style="padding:0.1px;">
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
        <div class="col-md-4 justify-content-center" id="test">

            <div class="group my-4">
                <label class="fw-bolder" id="title_label">Título de la Encuesta</label>
                <input value="<?= $title; ?>" type="text" id="title_input" class="form-control form-control-sm" maxlength="30" required> <!-- Title Input -->
                <span class="highlight"></span>
                <span class="bar"></span>
            </div>
            <div class="group my-4">
                <label class="fw-bolder" id="objective_label">Objetivo de la Encuesta</label>
                <input value="<?= $objective; ?>" type="text" id="objective_input" class="form-control form-control-sm" maxlength="100" required> <!-- Title Input -->
                <span class="highlight"></span>
                <span class="bar"></span>
            </div>
            <div class="group my-4">
                <label class="fw-bolder" id="description_label">Descripción de la Encuesta</label>
                <input value="<?= $description; ?>" type="text" id="description_input" class="form-control form-control-sm" maxlength="250" required> <!-- Title Input -->
                <span class="highlight"></span>
                <span class="bar"></span>
            </div>
        </div>
        <div class="col-md-4 justify-content-center d-flex align-items-center">
            <button class="btn" id="theme"><i class="bi bi-palette-fill fs-1"></i></button>
        </div>
    </div>
</div>


    <div id="update-messages" class="alert" style="display:none;text-align: center;">
        
    </div>

    <div id="question_container">

    
    <?php $question_id = 1; $option_id = 1; ?>
    <script> var questions = {}; var data_form = {}; var del_form = false; var del_user = false; </script>
    <?php foreach ($questions as $question) : ?>
        <?php if ($question['type'] == 'mcq') : ?>
            <script>
                questions[<?= $question_id; ?>] = ['mcq', 'question<?= $question_id; ?>', 'question<?= $question_id; ?>required'];
            </script>
            <<div class="container-fluid mt-3" id="content_here<?= $question_id; ?>" style="width: 100%;height: 340px;">
                <div class="row justify-content-center mb-3 " id="question_nb<?= $question_id; ?>">
                    <div class="col-lg-6 col-11" id="mcq_container<?= $question_id; ?>">
                        <div class="card border-0 shadow-sm bg-light px-4 d-flex my-4">
                            <button type="button" class="btn-close my-2 ms-auto btn-sm close" aria-label="Close" id="Del_Q<?= $question_id; ?>"></button>

                            <div class="row align-items-center my-2">
                                <div class="col">
                                    <input value="<?= $question['question']; ?>" class="form-control qTitle" type="text" id="question<?= $question_id; ?>">
                                </div>
                                <div class="col">
                                    <label for="">Pregunta</label>
                                    <i class="bi bi-check-circle"></i>
                                </div>
                            </div>

                            <div class="row align-items-center my-2" id="mcq_content<?= $question_id; ?>">
                            <?php foreach ($question['options'] as $option) : ?>
                                <script>
                                    $('#mcq_container<?= $question_id; ?>').height($('#mcq_container<?= $question_id; ?>').height() + 100);
                                    $('#content_here<?= $question_id; ?>').height($('#content_here<?= $question_id; ?>').height() + 100);
                                    $('#mcq_content<?= $question_id; ?>').height($('#mcq_content<?= $question_id; ?>').height() + 100);
                                </script>
                                <div class="form-group group se">
                                    <div class="col d-flex align-items-center gap-2">
                                        <i class="bi bi-circle"></i>
                                        <input class="form-control qOption" type="text" value="<?= $option; ?>" id="option<?= $option_id; ?>" maxlength="30" required>
                                        <label for="">Opción</label>
                                        </div>
                                </div>
                                    
                                <button id="Del_mcq_question<?= $question_id; ?>_option<?= $option_id; ?>" class="Del_OptQ close btn text-danger text-end"
                                type="button"><i class="bi bi-trash-fill"></i></button>

                                <script>
                                    questions[<?= $question_id; ?>].push('option<?= $option_id; ?>');
                                </script>
                                <?php $option_id++; ?>
                            <?php endforeach; ?>

                            </div>
                            

                            <div class="row align-items-center my-2 py-4 px-2" id="mcq_footer">
                                <div class="col d-flex align-items-center gap-2" id="mcq_footer">
                                <button class="btn btn-success mcq" id="add_opt<?= $question_id; ?>" style="background-color:#7c942c !important; font-size:14px;">Agregar</button>
                                            <label class="switch">
                                            <?php if ( $question['required'] == 1 ) : ?>
                                                <input id="question<?= $question_id; ?>required" required type="checkbox" checked> <span class="slider round"></span>Requerida
                                            <?php else: ?>
                                                <input id="question<?= $question_id; ?>required" required type="checkbox"> <span class="slider round"></span>Requerida
                                            <?php endif; ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php elseif ($question['type'] == 'checkbox') : ?>
            <script>
                questions[<?= $question_id; ?>] = ['checkbox', 'question<?= $question_id; ?>', 'question<?= $question_id; ?>required'];
            </script>
            <div class="container-fluid mt-3" id="content_here<?= $question_id; ?>" style="width: 100%;height: 340px;">
                <div class="row justify-content-center mb-3 " id="question_nb<?= $question_id; ?>">
                    <div class="col-lg-6 col-11" id="mcq_container<?= $question_id; ?>">
                        <div class="card border-0 shadow-sm bg-light px-4 d-flex my-4">
                            <button type="button" class="btn-close my-2 ms-auto btn-sm close" aria-label="Close" id="Del_Q<?= $question_id; ?>"></button>

                            <div class="row align-items-center my-2">
                                <div class="col">
                                    <input value="<?= $question['question']; ?>" class="form-control qTitle" type="text" id="question<?= $question_id; ?>">
                                </div>
                                <div class="col">
                                    <label for="">Pregunta</label>
                                    <i class="bi bi-check-square"></i>
                                </div>
                            </div>

                            <div class="row align-items-center my-2" id="mcq_content<?= $question_id; ?>">
                            <?php foreach ($question['options'] as $option) : ?>
                                <script>
                                    $('#mcq_container<?= $question_id; ?>').height($('#mcq_container<?= $question_id; ?>').height() + 100);
                                    $('#content_here<?= $question_id; ?>').height($('#content_here<?= $question_id; ?>').height() + 100);
                                    $('#mcq_content<?= $question_id; ?>').height($('#mcq_content<?= $question_id; ?>').height() + 100);
                                </script>
                                <div class="form-group group se">
                                    <div class="col d-flex align-items-center gap-2">
                                        <i class="bi bi-square"></i>
                                        <input class="form-control qOption" type="text" value="<?= $option; ?>" id="option<?= $option_id; ?>" maxlength="30" required>
                                        <label for="">Opción</label>
                                        </div>
                                </div>
                                    
                                <button id="Del_mcq_question<?= $question_id; ?>_option<?= $option_id; ?>" class="Del_OptQ close btn text-danger text-end"
                                type="button"><i class="bi bi-trash-fill"></i></button>

                                <script>
                                    questions[<?= $question_id; ?>].push('option<?= $option_id; ?>');
                                </script>
                                <?php $option_id++; ?>
                            <?php endforeach; ?>

                            </div>
                            

                            <div class="row align-items-center my-2 py-4" id="mcq_footer">
                                <div class="col d-flex align-items-center gap-2" id="mcq_footer">
                                <button class="btn btn-success cxq" id="add_opt<?= $question_id; ?>" style="background-color:#7c942c !important; font-size:14px;">Agregar</button>
                                            <label class="switch">
                                            <?php if ( $question['required'] == 1 ) : ?>
                                                <input id="question<?= $question_id; ?>required" required type="checkbox" checked> <span class="slider round"></span>Requerida
                                            <?php else: ?>
                                                <input id="question<?= $question_id; ?>required" required type="checkbox"> <span class="slider round"></span>Requerida
                                            <?php endif; ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php elseif ($question['type'] == 'open') : ?>
            <script>
                questions[<?= $question_id; ?>] = ['open', 'question<?= $question_id; ?>', 'question<?= $question_id; ?>required'];
            </script>
            <div class="container-fluid mt-3" id="content_here<?= $question_id; ?>">
                <div class="row justify-content-center mb-3 " id="question_nb<?= $question_id; ?>">
                    <div class="col-lg-6 col-11" id="mcq_container<?= $question_id; ?>">
                        <div class="card border-0 shadow-sm bg-light px-4 d-flex my-4">
                            <button type="button" class="btn-close my-2 ms-auto btn-sm close" aria-label="Close" id="Del_Q<?= $question_id; ?>"></button>

                            <div class="row align-items-center my-2">
                                <div class="col-8">
                                    <input value="<?= $question['question']; ?>" class="form-control qTitle" type="text" id="question<?= $question_id ?>">
                                </div>
                                <div class="col-4">
                                    <label for="">Pregunta</label>
                                    <i class="bi bi-question"></i>
                                </div>
                            </div>

                            <div class="row align-items-center my-2 py-4 px-2" id="mcq_footer">
                                <div class="col d-flex align-items-center gap-2 justify-content-end" id="mcq_footer">
                                            <label class="switch">
                                            <?php if ( $question['required'] == 1 ) : ?>
                                                <input id="question<?= $question_id; ?>required" required type="checkbox" checked> <span class="slider round"></span>Requerida
                                            <?php else: ?>
                                                <input id="question<?= $question_id; ?>required" required type="checkbox"> <span class="slider round"></span>Requerida
                                            <?php endif; ?>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <?php elseif ($question['type'] == 'valoration') : ?>
            <script>
                questions[<?= $question_id; ?>] = ['valoration', 'question<?= $question_id; ?>', 'question<?= $question_id; ?>required'];
            </script>
            <div class="container-fluid mt-3" id="content_here<?= $question_id; ?>">
                <div class="row justify-content-center mb-3 " id="question_nb<?= $question_id; ?>">
                    <div class="col-lg-6 col-11" id="mcq_container<?= $question_id; ?>">
                        <div class="card border-0 shadow-sm bg-light px-4 d-flex my-4">
                            <button type="button" class="btn-close my-2 ms-auto btn-sm close" aria-label="Close" id="Del_Q<?= $question_id; ?>"></button>

                            <div class="row align-items-center my-2">
                                <div class="col-8">
                                    <input value="<?= $question['question']; ?>" class="form-control qTitle" type="text" id="question<?= $question_id ?>">
                                </div>
                                <div class="col-4">
                                    <label for="">Pregunta</label>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                            </div>

                            <div class="row align-items-center my-2 py-4 px-2" id="mcq_footer">
                                <div class="col d-flex align-items-center gap-2 justify-content-end" id="mcq_footer">
                                            <label class="switch">
                                            <?php if ( $question['required'] == 1 ) : ?>
                                                <input id="question<?= $question_id; ?>required" required type="checkbox" checked> <span class="slider round"></span>Requerida
                                            <?php else: ?>
                                                <input id="question<?= $question_id; ?>required" required type="checkbox"> <span class="slider round"></span>Requerida
                                            <?php endif; ?>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        <?php elseif ($question['type'] == 'date') : ?>
            <script>
                questions[<?= $question_id; ?>] = ['date', 'question<?= $question_id; ?>', 'question<?= $question_id; ?>required'];
            </script>
            <div class="container-fluid mt-3" id="content_here<?= $question_id; ?>">
                <div class="row justify-content-center mb-3 " id="question_nb<?= $question_id; ?>">
                    <div class="col-lg-6 col-11" id="mcq_container<?= $question_id; ?>">
                        <div class="card border-0 shadow-sm bg-light px-4 d-flex my-4">
                            <button type="button" class="btn-close my-2 ms-auto btn-sm close" aria-label="Close" id="Del_Q<?= $question_id; ?>"></button>
            
                            <div class="row align-items-center my-2">
                                <div class="col-8">
                                    <input id="question<?= $question_id; ?>" value="<?= $question['question']; ?>" class="form-control qTitle" type="text">
                                </div>
                                <div class="col-4">
                                    <label for="">Pregunta</label>
                                    <i class="bi bi-calendar4-event"></i>
                                </div>
                            </div>
            
                            <div class="row align-items-center my-2 py-4 px-2" id="mcq_footer">
                                <div class="col d-flex align-items-center gap-2 justify-content-end" id="mcq_footer">
                                            <label class="switch">
                                            <?php if ( $question['required'] == 1 ) : ?>
                                                <input id="question<?= $question_id; ?>required" required type="checkbox" checked> <span class="slider round"></span>Requerida
                                            <?php else: ?>
                                                <input id="question<?= $question_id; ?>required" required type="checkbox"> <span class="slider round"></span>Requerida
                                            <?php endif; ?>
                                    </label>
                                </div>
                            </div>
            
                        </div>
                    </div>
                </div>
            </div>
        <?php elseif ($question['type'] == 'time') : ?>
            <script>
                questions[<?= $question_id; ?>] = ['time', 'question<?= $question_id; ?>', 'question<?= $question_id; ?>required'];
            </script>
            <div class="container-fluid mt-3" id="content_here<?= $question_id; ?>">
                <div class="row justify-content-center mb-3 " id="question_nb<?= $question_id; ?>">
                    <div class="col-lg-6 col-11" id="mcq_container<?= $question_id; ?>">
                        <div class="card border-0 shadow-sm bg-light px-4 d-flex my-4">
                            <button type="button" class="btn-close my-2 ms-auto btn-sm close" aria-label="Close" id="Del_Q<?= $question_id; ?>"></button>

                            <div class="row align-items-center my-2">
                                <div class="col-8">
                                    <input id="question<?= $question_id; ?>" value="<?= $question['question']; ?>" class="form-control qTitle" type="text">
                                </div>
                                <div class="col-4">
                                    <label for="">Pregunta</label>
                                    <i class="bi bi-clock"></i>
                                </div>
                            </div>

                            <div class="row align-items-center my-2 py-4 px-2" id="mcq_footer">
                                <div class="col d-flex align-items-center gap-2 justify-content-end" id="mcq_footer">
                                            <label class="switch">
                                            <?php if ( $question['required'] == 1 ) : ?>
                                                <input id="question<?= $question_id; ?>required" required type="checkbox" checked> <span class="slider round"></span>Requerida
                                            <?php else: ?>
                                                <input id="question<?= $question_id; ?>required" required type="checkbox"> <span class="slider round"></span>Requerida
                                            <?php endif; ?>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ($question['type'] == 'range') : ?>
            <script>
                questions[<?= $question_id; ?>] = ['range', 'question<?= $question_id; ?>', 'question<?= $question_id; ?>required'];
            </script>
            <div class="container-fluid mt-3" id="content_here<?= $question_id; ?>">
                <div class="row justify-content-center mb-3 " id="question_nb<?= $question_id; ?>">
                    <div class="col-lg-6 col-11" id="mcq_container<?= $question_id; ?>">
                        <div class="card border-0 shadow-sm bg-light px-4 d-flex my-4">
                            <button type="button" class="btn-close my-2 ms-auto btn-sm close" aria-label="Close" id="Del_Q<?= $question_id; ?>"></button>

                            <div class="row align-items-center my-2">
                                <div class="col-8">
                                <input type="text" value="<?= $question['question']; ?>" id="question<?= $question_id ?>" class="form-control qTitle" maxlength="70" required>
                                </div>
                                <div class="col-4">
                                    <label for="">Pregunta</label>
                                    <i class="bi bi-arrow-left-right"></i>
                                </div>
                            </div>

                            <div class="row align-items-center my-2 py-4 px-2" id="mcq_footer">
                                <div class="col d-flex align-items-center gap-2 justify-content-end" id="mcq_footer">
                                            <label class="switch">
                                            <?php if ( $question['required'] == 1 ) : ?>
                                                <input id="question<?= $question_id; ?>required" required type="checkbox" checked> <span class="slider round"></span>Requerida
                                            <?php else: ?>
                                                <input id="question<?= $question_id; ?>required" required type="checkbox"> <span class="slider round"></span>Requerida
                                            <?php endif; ?>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php $question_id++; ?>
    <?php endforeach; ?>
    </div>

<div class="row justify-content-center bg-dark" id="container_add">
    <div class="col-12 text-center bg-light">
        <div class="accordion border-0 p-0 m-0" id="accordionExample">
            <div class="accordion-item border-0 p-0 m-0 bg-light">
                <h2 class="accordion-header" id="headingOne">
                    <button class="btn btn-sm bg-blue my-4" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        + Agregar
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show border-0 p-0 m-0"
                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body border-0 p-0 m-0 bg-light">
                        <ul class="nav flex-row justify-content-center bg-light gap-2">
                            <li class="nav-item bg-light mt-2 rounded shadow-sm"><a href="#bottom" id="MCQ" class="Q"><i class="far fa-dot-circle" style="color: #007bff"></i> MCQ</a></li>
                            <li class="nav-item bg-light mt-2 rounded shadow-sm"><a href="#bottom" id="CXQ" class="Q"><i class="far fa-check-square" style="color: #007bff"></i> Checkbox</a></li>
                            <li class="nav-item bg-light mt-2 rounded shadow-sm"><a href="#bottom" id="OQ" class="Q"><i class="fas fa-question" style="color: #007bff"></i> Abierta</a></li>
                            <li class="nav-item bg-light mt-2 rounded shadow-sm"><a href="#bottom" id="DATEQ" class="Q"><i class="far fa-calendar-alt" style="color: #007bff"></i> Fecha</a></li>
                            <li class="nav-item bg-light mt-2 rounded shadow-sm"><a href="#bottom" id="TIMEQ" class="Q"><i class="far fa-clock" style="color: #007bff"></i> Tiempo</a></li>
                            <li class="nav-item bg-light mt-2 rounded shadow-sm"><a href="#bottom" id="RANGEQ" class="Q"><i class="fas fa-ruler-horizontal" style="color: #007bff"></i> Rango</a></li>
                            <li class="nav-item bg-light mt-2 rounded shadow-sm"><a class="nav-link text-dark" href=""><i class="bi bi-border-all"></i> Matriz</a></li>
                            <li class="nav-item bg-light mt-2 rounded shadow-sm"><a href="#bottom" id="VALQ" class="Q"><i class="bi-star-fill" style="color: #007bff"></i> Valoración</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script>
        question_nb = <?= $question_id; ?>;
        option_nb = <?= $option_id; ?>;
    </script>

<button onclick="topFunction()" id="myBtn" title="Go to top" class="btn"><i class="bi bi-arrow-up-circle-fill h2"></i></button>

    <footer class="p-2 m-2 bg-light">
        <button id="update" class="btn btn-success">
            Actualizar <i class='fa fa-refresh' aria-hidden="true"></i> 
        </button>
    </footer>

    <script>
        /* THEME SELECTION */
        $("#dark_theme").click(function(){
            $("#main").css("background-image", "url('<?= base_url('assets/img/dark.jpg');?>')");

            $("body").animate({
                backgroundColor: '#212121', //'rgb(200,200,200)',
            });
            $("#dark_theme").attr("disabled", true);

            $("#light_theme").attr("disabled", false);
        })

        $("#light_theme").click(function(){

            $("#main").css("background-image", "url('<?= base_url('assets/img/form_background.jpg');?>')");

            $("body").animate({
                backgroundColor: 'rgb(244,244,244)',
            });
            $("#dark_theme").attr("disabled", false);

            $("#light_theme").attr("disabled", true);
        });
    </script>


    <script>
    $(document).ready(function(){
        $('#update').click(function(){
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
                url:'<?= site_url('surveys/update_survey'); ?>',
                dataType:'json',
                data : {
                    data : data,
                    img:$('#proj_img').attr('src'),
                    id:<?= $qf_id; ?>
                },
                success : function(data){
                    if ( data['error'] == true){
                        if (data['empty']){
                            $('#update-messages').css('display' , 'block');
                            $('#update-messages').removeClass('alert-success').addClass('alert-danger')
                            $('#update-messages').text('Por favor ingrese al menos una pregunta');
                            window.location.href = '#title_label';
                        }
                        else if ( data['double'] ){
                            $('input').css('border-bottom' , '1px solid #757575');
                            $.each(data['double'] , function(k,v){
                                el = ( questions[v[0]][1] );
                                $(`#${el}`).css('border-bottom' , '1px solid red');
                                el = ( questions[v[1]][1] );
                                $(`#${el}`).css('border-bottom' , '1px solid red');
                            });
                            $('#update-messages').css('display' , 'block');
                            $('#update-messages').removeClass('alert-success').addClass('alert-danger')
                            $('#update-messages').text('La misma pregunta se repite dos veces o más !');
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
                            $('#update-messages').css('display' , 'block');
                            $('#update-messages').removeClass('alert-success').addClass('alert-danger')
                            $('#update-messages').text('Hay campos vacios'+title);
                            window.location.href = '#title_label';
                        }
                    }
                    else{
                        $('input').css('border-bottom' , '1px solid #757575');
                        $('#update-messages').css('display' , 'block');
                        $('#update-messages').removeClass('alert-danger').addClass('alert-success')
                        $('#update-messages').text('Encuesta actualizada con éxito !');
                        window.location.href = '#title_label';
                        //console.log(data['question_orphans']);
                        
                    }
                    setTimeout(function(){
                        $('#update-messages').fadeOut('slow');
                    },5000);
                },
                error : function(xhr,status,error){
                    $('#update-messages').css('display' , 'block');
                    $('#update-messages').removeClass('alert-success').addClass('alert-danger')
                    $('#update-messages').text('Ha habido un error');
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                    setTimeout(function(){
                        $('#update-messages').fadeOut('slow');
                    },5000);
                }
            });
            
        });
    });
    </script>
    <div id="bottom"></div>
</div>

<div style="display: none;" id="answers_container"> <!-- ICI -->
<div class="row d-flex justify-content-center">
    <div class="col-6 d-flex justify-content-center">
        <a href="javascript:pruebaDivAPdf('<?=$title;?>')" class="btn btn-danger">Pasar a PDF</a>
    </div>
</div>
    <div class="row justify-content-center p-2 mb-2" style="height:100%;max-width:1918px">
        <div class="text-center">
            <h6>
                <?php if( count($answers) > 0 ): ?>
                    Respuesta : <strong id="num_form" style="color:#0079ca">1</strong> / <?=count($answers);?>
                <?php else:?>
                    Respuesta : <strong id="num_form" style="color:#0079ca">0</strong> / <?=count($answers);?>
                <?php endif;?>
                </h6>
        </div>
    </div>
    <script> 
        var total = <?= count($answers); ?>;
        var form_num = 1;
    </script>
    
    <div id="carouselExampleIndicators" class="carousel carousel-dark slide" data-interval="false">
  
    <div class="carousel-inner">
    <?php for( $i=0 ; $i < count($answers) ; $i++ ) : ?>
        <?php if ( $i == 0 ) : ?> 
            <div class="carousel-item active">
        <?php else : ?>
            <div class="carousel-item">
        <?php endif; ?>
        <?php foreach ($questions as $question) : ?>
            <?php $a = '' ;?>
            <?php if ($question['type'] == 'mcq'): ?>
                <?php $h = ($question['required'] == 1) ? 100 + ( count($question['options'])*80 ) : 50 + ( count($question['options'])*80 );?>
                <div class="container-fluid mt-3">
                    <div class="row justify-content-center my-2">
                        <div class="col-md-6 col-lg-5 col-xl-4 col-12 p-4 shadow-sm bg-white">
                            <div class="row justify-content-center">
                                <div class="group d-flex justify-content-center" > 
                                <span class="highlight"></span> <span class="bar"></span> 
                                    <h2 class="fw-bolder"><?= $question['question']; ?></h2>
                                </div>
                            </div>
                            <?php if($question['required'] == 1) : ?>
                                <div class="row justify-content-center flex-column">
                            <?php else: ?>
                                <div class="row justify-content-center flex-column">
                            <?php endif; ?>
                                <?php $opt_id = 0; ?>
                                <?php foreach( $answers[$i]['answers'] as $ans ): ?>
                                    <?php if( $ans['question_id'] == $question['id'] ): ?>
                                        <?php $a = $ans['answer'];break; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <p class="fw-bolder">Respuestas:</p>
                                <?php foreach($question['options'] as $option): ?>
                                    <div class="group se d-flex justify-content-center" > 
                                        <div style="width:100%;">
                                                <div style="float:left;">
                                                <?php if ( $a == $option ) : ?>
                                                    <i class="fa fa-circle"></i>    
                                                <?php else : ?>
                                                    <i class="far fa-circle"></i>    
                                                <?php endif; ?>
                                            </div>

                                            <input readonly type="text" class="border-0 qOption" value="<?= $option; ?>" maxlength="30"> 

                                            
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <?php if($question['required'] == 1) : ?>
                                <div class="row justify-content-center" style="height: 70px;">
                                    <p style="margin-left:auto;margin-right:2%;font-size: 15px;color: rgb(54, 54, 54)"><i class="fas fa-asterisk" style="font-size: 10px;color: red;"></i>Necesaria</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php elseif( $question['type'] == 'checkbox' ) : ?>
                    <?php $h = ($question['required'] == 1) ? 100 + ( count($question['options'])*80 ) : 50 + ( count($question['options'])*80 );?>
                    <div class="container-fluid mt-3">
                        <div class="row justify-content-center my-2">
                            <div class="col-md-6 col-lg-5 col-xl-4 col-12 p-4 shadow-sm bg-white">
                                <div class="row justify-content-center">
                                    <div class="group d-flex justify-content-center" > 
                                    <span class="highlight"></span> <span class="bar"></span> 
                                    <h2 class="fw-bolder"><?= $question['question']; ?></h2>
                                    </div>
                                </div>
                                <?php if($question['required'] == 1) : ?>
                                    <div class="row justify-content-center flex-column">
                                <?php else: ?>
                                    <div class="row justify-content-center flex-column">
                                <?php endif; ?>
                                    <?php $opt_id = 0;$ar=array(); ?>
                                    <?php foreach( $answers[$i]['answers'] as $ans ): ?>
                                        <?php if( $ans['question_id'] == $question['id'] ): ?>
                                            <?php array_push( $ar,$ans['answer'] ); ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <p class="fw-bolder">Respuestas:</p>
                                    <?php foreach($question['options'] as $option): ?>
                                        <div class="group se d-flex justify-content-center" > 
                                            <div style="width:100%;">
                                                <div style="float:left;">
                                                    <?php if( in_array($option,$ar)  ): ?>
                                                        <i class="fa fa-check-square"></i>
                                                    <?php else : ?>
                                                        <i class="far fa-square"></i>
                                                    <?php endif;?>
                                                </div>
                                                <input readonly type="text" class="border-0 qOption" value="<?= $option; ?>" maxlength="30">
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <?php if($question['required'] == 1) : ?>
                                    <div class="row justify-content-center" style="height: 70px;">
                                        <p style="margin-left:auto;margin-right:2%;font-size: 15px;color: rgb(54, 54, 54)"><i class="fas fa-asterisk" style="font-size: 10px;color: red;"></i>Necesaria</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
            <?php elseif( $question['type'] == 'open' ) : ?>
                <div class="container-fluid mt-3">
                    <div class="row justify-content-center my-2">
                        <div class="col-md-6 col-lg-5 col-xl-4 col-12 p-4 shadow-sm bg-white">
                            <div class="row justify-content-center">
                                <div class="group d-flex justify-content-center" > 
                                    <span class="highlight"></span> <span class="bar"></span> 
                                    <h2 class="fw-bolder"><?= $question['question']; ?></h2>
                                </div>
                            </div>
                            
                            <?php foreach( $answers[$i]['answers'] as $ans ): ?>
                                <?php if( $ans['question_id'] == $question['id'] ): ?>
                                    <?php $a = $ans['answer'];break; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <div class="row justify-content-center">
                                <div class="form-group"> <!-- OPEN HERE -->
                                <p><span class="fw-bolder">Respuesta:</span> <?= $a; ?></p>
                                </div>
                            </div>
                            <?php if($question['required'] == 1) : ?>
                                <div class="row justify-content-center" style="height: 50px;">
                                    <p style="margin-left:auto;margin-right:2%;font-size: 15px;color: rgb(54, 54, 54)"><i class="fas fa-asterisk" style="font-size: 10px;color: red;"></i>Necesaria</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <?php elseif( $question['type'] == 'valoration' ) : ?>
                <div class="container-fluid mt-3">
                    <div class="row justify-content-center my-2">
                        <div class="col-md-6 col-lg-5 col-xl-4 col-12 p-4 shadow-sm bg-white">
                            <div class="row justify-content-center">
                                <div class="group d-flex justify-content-center" > 
                                    <span class="highlight"></span> <span class="bar"></span> 
                                    <h2 class="fw-bolder"><?= $question['question']; ?></h2>
                                </div>
                            </div>
                            
                            <?php foreach( $answers[$i]['answers'] as $ans ): ?>
                                <?php if( $ans['question_id'] == $question['id'] ): ?>
                                    <?php $a = $ans['answer'];break; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <div class="row justify-content-center">
                                <div class="form-group"> <!-- OPEN HERE -->
                                <p><span class="fw-bolder">Valoración de</span> <?= $a; ?></p>
                                </div>
                            </div>
                            <?php if($question['required'] == 1) : ?>
                                <div class="row justify-content-center" style="height: 50px;">
                                    <p style="margin-left:auto;margin-right:2%;font-size: 15px;color: rgb(54, 54, 54)"><i class="fas fa-asterisk" style="font-size: 10px;color: red;"></i>Necesaria</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            <?php elseif( $question['type'] == 'date' ) : ?>
                <div class="container-fluid mt-3">
                    <div class="row justify-content-center my-2">
                        <div class="col-md-6 col-lg-5 col-xl-4 col-12 p-4 shadow-sm bg-white">
                            <div class="row justify-content-center">
                                <div class="group d-flex justify-content-center" > 
                                <span class="highlight"></span> <span class="bar"></span> 
                                    <h2 class="fw-bolder"><?= $question['question']; ?></h2>
                                </div>
                            </div>
                            <?php foreach( $answers[$i]['answers'] as $ans ): ?>
                                <?php if( $ans['question_id'] == $question['id'] ): ?>
                                    <?php $a = $ans['answer'];break; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <div class="row justify-content-center">
                                <input readonly type="text" class="border-0 qOption" value="<?= $a ?>" maxlength="30"> 
                            </div>
                            <?php if($question['required'] == 1) : ?>
                                <div class="row justify-content-center" style="height: 100px;">
                                    <p style="margin-left:auto;margin-right:2%;font-size: 15px;color: rgb(54, 54, 54)"><i class="fas fa-asterisk" style="font-size: 10px;color: red;"></i>Necesaria</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php elseif( $question['type'] == 'time' ): ?>
                <div class="container-fluid mt-3">
                    <div class="row justify-content-center my-2">
                        <div class="col-md-6 col-lg-5 col-xl-4 col-12 p-4 shadow-sm bg-white">
                            <div class="row justify-content-center">
                                <div class="group d-flex justify-content-center" > 
                                <span class="highlight"></span> <span class="bar"></span> 
                                    <h2 class="fw-bolder"><?= $question['question']; ?></h2>
                                </div>
                            </div>
                            <?php foreach( $answers[$i]['answers'] as $ans ): ?>
                                <?php if( $ans['question_id'] == $question['id'] ): ?>
                                    <?php $a = $ans['answer'];break; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <div class="row justify-content-center">
                                <input readonly type="text" class="border-0 qOption" value="<?= $a ?>" maxlength="30"> 
                            </div>
                            <?php if($question['required'] == 1) : ?>
                                <div class="row justify-content-center" style="height: 100px;">
                                    <p style="margin-left:auto;margin-right:2%;font-size: 15px;color: rgb(54, 54, 54)"><i class="fas fa-asterisk" style="font-size: 10px;color: red;"></i>Necesaria</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php elseif( $question['type'] == 'range' ) : ?>
                <div class="container-fluid mt-3">
                    <div class="row justify-content-center my-2">
                        <div class="col-md-6 col-lg-5 col-xl-4 col-12 p-4 shadow-sm bg-white">
                            <div class="row justify-content-center">
                                <div class="group d-flex justify-content-center" > 
                                <span class="highlight"></span> <span class="bar"></span> 
                                    <h2 class="fw-bolder"><?= $question['question']; ?></h2>
                                </div>
                            </div>
                            <?php foreach( $answers[$i]['answers'] as $ans ): ?>
                                <?php if( $ans['question_id'] == $question['id'] ): ?>
                                    <?php $a = $ans['answer'];break; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <div class="form-group row">
                                <?php if( $a != '' ): ?>
                                    <?php $r = explode(',' , $a); ?>
                                    <label for="example-number-input" class="col-2 col-form-label">De</label>
                                    <div class="col-4">
                                        <input class="border-0 form-control" type="number" value="<?=$r[0];?>" readonly>
                                    </div>
                                    <label for="example-number-input" class="col-2 col-form-label">A</label>
                                    <div class="col-4">
                                        <input class="border-0 form-control" type="number" value="<?=$r[1];?>" readonly>
                                    </div>
                                <?php else: ?>
                                    <label for="example-number-input" class="col-2 col-form-label">De</label>
                                    <div class="col-4">
                                        <input class="border-0form-control" type="number" readonly>
                                    </div>
                                    <label for="example-number-input" class="col-2 col-form-label">A</label>
                                    <div class="col-4">
                                        <input class="border-0 form-control" type="number" readonly>
                                    </div>
                                <?php endif;?>
                            </div>
                            <?php if($question['required'] == 1) : ?>
                                <div class="row justify-content-center" style="height: 20%;">
                                    <p style="margin-left:auto;margin-right:2%;font-size: 15px;color: rgb(54, 54, 54)"><i class="fas fa-asterisk" style="font-size: 10px;color: red;"></i>Necesaria</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
        </div>
    <?php endfor; ?>

    </div>
    <a id="prev" class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        <span class="sr-only">Previo</span>
    </a>
    <a id="next" class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon"></span>
        <span class="sr-only">Siguiente</span>
    </a>
    </div>

    <script> 
        if ( total != 0 )
        {
            $('#next').click(function(){
                form_num++;
                if ( form_num > total )
                    form_num = 1;

                $('#num_form').text(form_num);
            });
            $('#prev').click(function(){
                form_num--;
                if ( form_num == 0 )
                    form_num = total;
                
                $('#num_form').text(form_num);
            });
        }
    </script>
</div>

<style>

.chartDiv , .barDiv {
    width: 100%;
    height: 100%;
}

.carousel-control-prev,.carousel-control-next{
    top: -85px;
    height:10%;
}

#world{
    height:390px !important;
}

#linediv{
    height: 290px !important;
}

@media (max-width: 990px){
    #world{
        height:100% !important;
    }

    #linediv{
        height: 100% !important;
    }
}
</style>


<div id="summary_container">
<?php if( count($multiple_choices) > 0 ) : ?>
    <div class="container-fluid" >
        <div class="row justify-content-center mt-1" id="row1" style="height: 100%;">
            <div class="col-md-12 col-lg-4 mr-0 mr-lg-4" id="world" style="background-color: white;height: 100%;"> 
                <div class="mt-4">
                    <h3><b class="text-green">Título: </b><?=$title;?></h3>
                    <h4><b class="text-green">Objetivo: </b><?=$objective;?></h4>
                    <h4><b class="text-green">Descripción: </b><?=$description;?></h4>
                </div>
            </div>
            
            <div class="col-md-12 col-lg-6 ml-0 ml-lg-4 mt-3 mt-lg-0 mb-5" id="bar" style="background-color: white;height: 100%;"> 
                <div class="row justify-content-center mt-4 mb-3" style="height:50px;max-width:1918px">
                    <div style="width:150px; height:100%;background-color:white" align="center">
                        <p style="margin-top:10px;">
                            Pregunta : <strong id="num_multi_bar" style="color:#0079ca">1</strong> / <?=count($multiple_choices);?>
                        </p>
                        <script> var form_multi_bar=1; var total_multi_bar = <?=count($multiple_choices);?>; </script>
                    </div>
                </div>

                <div id="barCarousel" class="carousel carousel-dark slide" data-interval="false" data-ride="carousel">
                    <div id="carousel-bar" class="carousel-inner">

                    </div>
                    <a id="prev_multi_bar" class="carousel-control-prev" href="#barCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previo</span>
                    </a>
                    <a id='next_multi_bar' class="carousel-control-next" href="#barCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Siguiente</span>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <div class="container-fluid mt-1" >
        <div class="row justify-content-center mt-3" id="row2" style="height: 100%;">
            
            <div class="col-md-12 col-lg-6 mr-0 mr-lg-4 shadow-sm" id="round" style="height: 100%;background-color: white"> 

                <div class="row justify-content-center mt-4 mb-3" style="height:50px;max-width:1918px">
                    <div style="width:150px; height:100%;background-color:white">
                        <p style="margin-top:10px;">
                            Pregunta : <strong id="num_multi" style="color:#0079ca">1</strong> / <?=count($multiple_choices);?>
                        </p>
                        <script> var form_multi=1; var total_multi = <?=count($multiple_choices);?>; </script>
                    </div>
                </div>

                <div id="pieCarousel" class="carousel carousel-dark slide" data-interval="false" data-ride="carousel">
                    <div id="carousel-pie" class="carousel-inner">

                    </div>
                    <a id="prev_multi" class="carousel-control-prev" href="#pieCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previo</span>
                    </a>
                    <a id='next_multi' class="carousel-control-next" href="#pieCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Siguiente</span>
                    </a>
                </div>
            </div>
            <div class="col-md-12 col-lg-4 ml-0 ml-lg-4  mt-lg-0 mt-3 shadow-sm" id="line" style="background-color: white;height: 100%;"> 
                <div id="linediv" style="height: 100%;" ></div>
            </div>
        </div>
    </div>

</div>
</div>


<script> 
    $('#next_multi').click(function(){
        form_multi++;
        if ( form_multi > total_multi )
            form_multi = 1;

        $('#num_multi').text(form_multi);
    });
    $('#prev_multi').click(function(){
        form_multi--;
        if ( form_multi == 0 )
            form_multi = total_multi;
        
        $('#num_multi').text(form_multi);
    });
    $('#next_multi_bar').click(function(){
        form_multi_bar++;
        if ( form_multi_bar > total_multi_bar )
            form_multi_bar = 1;

        $('#num_multi_bar').text(form_multi_bar);
    });
    $('#prev_multi_bar').click(function(){
        form_multi_bar--;
        if ( form_multi_bar == 0 )
            form_multi_bar = total_multi_bar;
        
        $('#num_multi_bar').text(form_multi_bar);
    });
</script>

<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/maps.js"></script>
<script src="https://www.amcharts.com/lib/4/geodata/worldLow.js"></script>
<script src="https://www.amcharts.com/lib/4/geodata/usaLow.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

<?php $cpt=1; ?>
<?php foreach ( $multiple_choices as $multi_choice ) : ?>
    <?php $opts = array(); ?>
    <?php foreach( $multi_choice['options'] as $option ) : ?>
        <?php $opts[$option] = 0 ;?>
    <?php endforeach; ?>

    <?php foreach ( $answers as $ans ) :?>
        <?php foreach ( $ans['answers'] as $answer ): ?>
            <?php if ( $answer['question_id'] == $multi_choice['id'] ): ?>
                <?php $opts[$answer['answer']] += 1; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endforeach; ?>    
    <script>
        am4core.ready(function(){ // Pie Chart
            var options =  <?= json_encode( $opts ); ?>;
            am4core.useTheme(am4themes_animated);
            <?php if($cpt == 1): ?> 
                $('#carousel-pie').append('<div id="chartdiv<?=$cpt;?>" class="chartDiv carousel-item active" style="height:200px;" > </div><div style="position:absolute;height:25px;width:60px;background-color:red;top:170px"> </div>');
            <?php else: ?>
                $('#carousel-pie').append('<div id="chartdiv<?=$cpt;?>" class="chartDiv carousel-item" style="height:200px;" > </div><div style="position:absolute;height:25px;width:60px;background-color:white;top:170px"> </div>');
            <?php endif; ?>
            let chart = am4core.create('chartdiv<?=$cpt;?>', am4charts.PieChart);
            let d = [];
            $.each(options , function(k,v){
                let obj = {
                    "option": k,
                    "score": v
                };
                d.push(obj);
            });
            chart.data = d;
            var pieSeries = chart.series.push(new am4charts.PieSeries());
            pieSeries.dataFields.value = "score";
            pieSeries.dataFields.category = "option";
            pieSeries.slices.template.stroke = am4core.color("#fff");
            pieSeries.slices.template.strokeWidth = 2;
            pieSeries.slices.template.strokeOpacity = 1;
            pieSeries.hiddenState.properties.opacity = 1;
            pieSeries.hiddenState.properties.endAngle = -90;
            pieSeries.hiddenState.properties.startAngle = -90;
            chart.exporting.menu = new am4core.ExportMenu();
        });

        am4core.ready(function(){ // Bar Chart
            var options =  <?= json_encode( $opts ); ?>;
            am4core.useTheme(am4themes_animated);
            <?php if($cpt == 1): ?> 
                $('#carousel-bar').append('<div id="bardiv<?=$cpt;?>" class="barDiv carousel-item active" style="height:300px;" > </div><div style="position:absolute;height:25px;width:60px;background-color:white;top:272px"> </div>');
            <?php else: ?>
                $('#carousel-bar').append('<div id="bardiv<?=$cpt;?>" class="barDiv carousel-item" style="height:300px;"> </div> <div style="position:absolute;height:25px;width:60px;background-color:white;top:272px"> </div>');
            <?php endif; ?>
            var chart = am4core.create('bardiv<?=$cpt;?>', am4charts.XYChart)
            chart.colors.step = 2;

            chart.legend = new am4charts.Legend()
            chart.legend.position = 'top'
            chart.legend.paddingBottom = 20
            chart.legend.labels.template.maxWidth = 95

            var xAxis = chart.xAxes.push(new am4charts.CategoryAxis())
            xAxis.dataFields.category = 'category'
            xAxis.renderer.cellStartLocation = 0.1
            xAxis.renderer.cellEndLocation = 0.9
            xAxis.renderer.grid.template.location = 0;

            var yAxis = chart.yAxes.push(new am4charts.ValueAxis());
            yAxis.min = 0;

            function createSeries(value, name) {
                var series = chart.series.push(new am4charts.ColumnSeries())
                series.dataFields.valueY = value
                series.dataFields.categoryX = 'category'
                series.name = name

                series.events.on("hidden", arrangeColumns);
                series.events.on("shown", arrangeColumns);

                var bullet = series.bullets.push(new am4charts.LabelBullet())
                bullet.interactionsEnabled = false
                bullet.dy = 30;
                bullet.label.text = '{valueY}'
                bullet.label.fill = am4core.color('#ffffff')

                return series;
            }
            let d = [];
            let obj = {
                'category' : '<?=$multi_choice['question'];?>'
            };
            $.each(options , function(k,v){
                obj[k] = v;
                createSeries( k , k );
            });
            d.push(obj);

            chart.data = d;

            function arrangeColumns() {

                var series = chart.series.getIndex(0);

                var w = 1 - xAxis.renderer.cellStartLocation - (1 - xAxis.renderer.cellEndLocation);
                if (series.dataItems.length > 1) {
                    var x0 = xAxis.getX(series.dataItems.getIndex(0), "categoryX");
                    var x1 = xAxis.getX(series.dataItems.getIndex(1), "categoryX");
                    var delta = ((x1 - x0) / chart.series.length) * w;
                    if (am4core.isNumber(delta)) {
                        var middle = chart.series.length / 2;

                        var newIndex = 0;
                        chart.series.each(function(series) {
                            if (!series.isHidden && !series.isHiding) {
                                series.dummyData = newIndex;
                                newIndex++;
                            }
                            else {
                                series.dummyData = chart.series.indexOf(series);
                            }
                        })
                        var visibleCount = newIndex;
                        var newMiddle = visibleCount / 2;

                        chart.series.each(function(series) {
                            var trueIndex = chart.series.indexOf(series);
                            var newIndex = series.dummyData;

                            var dx = (newIndex - trueIndex + middle - newMiddle) * delta

                            series.animate({ property: "dx", to: dx }, series.interpolationDuration, series.interpolationEasing);
                            series.bulletsContainer.animate({ property: "dx", to: dx }, series.interpolationDuration, series.interpolationEasing);
                        })
                    }
                }
            }
        chart.exporting.menu = new am4core.ExportMenu();
        });
        
        am4core.ready(function(){ // Line Chart
            var dates = <?= json_encode($dates); ?> ;
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("linediv", am4charts.XYChart);
            var data = [];
            var value = 50;
            $.each(dates , function(k,v){
                let date = v['date'];
                let value = v['count']; 
                data.push({date:date, value: value});
            });

            chart.data = data;
            var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
            dateAxis.renderer.minGridDistance = 60;
            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            var series = chart.series.push(new am4charts.LineSeries());
            series.dataFields.valueY = "value";
            series.dataFields.dateX = "date";
            series.tooltipText = "{value}"
            series.tooltip.pointerOrientation = "vertical";
            chart.cursor = new am4charts.XYCursor();
            chart.cursor.snapToSeries = series;
            chart.cursor.xAxis = dateAxis;
            chart.scrollbarX = new am4core.Scrollbar();
        }); 

        am4core.ready(function(){
            var locations = <?= json_encode($locations); ?>;
            // Themes begin
            am4core.useTheme(am4themes_animated);

            // Create map instance
            var chart = am4core.create("worlddiv", am4maps.MapChart);

            // Set map definition
            chart.geodata = am4geodata_worldLow;

            // Set projection
            chart.projection = new am4maps.projections.Miller();

            // Create map polygon series
            var polygonSeries = chart.series.push(new am4maps.MapPolygonSeries());

            // Exclude Antartica
            polygonSeries.exclude = ["AQ"];

            // Make map load polygon (like country names) data from GeoJSON
            polygonSeries.useGeodata = true;

            // Configure series
            var polygonTemplate = polygonSeries.mapPolygons.template;
            polygonTemplate.tooltipText = "{name}";
            polygonTemplate.polygon.fillOpacity = 0.6;


            // Create hover state and set alternative fill color
            var hs = polygonTemplate.states.create("hover");
            hs.properties.fill = chart.colors.getIndex(0);

            // Add image series
            var imageSeries = chart.series.push(new am4maps.MapImageSeries());
            imageSeries.mapImages.template.propertyFields.longitude = "longitude";
            imageSeries.mapImages.template.propertyFields.latitude = "latitude";
            imageSeries.mapImages.template.tooltipText = "{title}";
            imageSeries.mapImages.template.propertyFields.url = "url";

            var circle = imageSeries.mapImages.template.createChild(am4core.Circle);
            circle.radius = 3;
            circle.propertyFields.fill = "color";

            var circle2 = imageSeries.mapImages.template.createChild(am4core.Circle);
            circle2.radius = 3;
            circle2.propertyFields.fill = "color";


            circle2.events.on("inited", function(event){
            animateBullet(event.target);
            })


            function animateBullet(circle) {
                var animation = circle.animate([{ property: "scale", from: 1, to: 5 }, { property: "opacity", from: 1, to: 0 }], 1000, am4core.ease.circleOut);
                animation.events.on("animationended", function(event){
                animateBullet(event.target.object);
                })
            }

            var colorSet = new am4core.ColorSet();
            var data = [];
            $.each(locations , function(k,v){
                let obj = {
                    'title' : v['city'] ,
                    'latitude': Number( v['lat'] ) ,
                    'longitude':Number( v['lon'] ) ,
                    'color' : colorSet.next()
                }
                data.push(obj);
            });
            imageSeries.data = data;

            }); // end am4core.ready()
    </script>
    <?php $cpt++; ?>
<?php endforeach; ?>

<?php else: ?>
    <div id="summary_container">
        <div class="jumbotron mt-5">
            <h1 class="display-4 text-center" style="font-family: 'Noto Sans', sans-serif;">Agrega MCQ / Checkbox a tu encuesta</h1>
            <br>
            <h2 class="display-5 text-center" style="font-family: 'Noto Sans', sans-serif;" >para obtener visualizaciones gráficas</h2>
        </div>
    </div>
<?php endif; ?>

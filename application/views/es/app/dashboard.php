<script> var id = false; </script>

<style>
    body{
        width: 100%;
        box-sizing: border-box;
        background-color: rgb(244,244,244);
        overflow-x: hidden;
    }
</style>
<div class="right_col" role="main">
    <div style="background-color: white;position: absolute;z-index:2;width: 100%;height: 100%;opacity: 0.7;" id="load">
        <div class="load">
          <hr/><hr/><hr/><hr/>
         </div>
         <h1 style="position: absolute;top: 50%;left: 25%; font-family:'Helvetica Neue'; ">Solucionestai Módulo encuestas</h1>
    </div>

    <div class="container-fluid" style="background-color: black;position: absolute;width: 100%;height: 100%;background-color: rgba(50,50,50,0.8);z-index: 3;position: fixed;display: none;" id="send_form">
        <div class="row" style="height: 100%; padding: 0.1px;">
            <div class="col-md-8 col-lg-8 col-xl-5 mx-auto" style="height: 400px;background-image: url('<?= base_url('assets/img/logo_paper.png');?>');background-repeat: no-repeat;background-size: 40% 50%;background-position:bottom center;background-color: white;margin-top:30vh" id="fofo">
                <div class="row justify-content-end " style="height: 17%;font-family: 'Helvetica Neue'; padding: 0.1px;" id="subitle_container">

                <div class="col-12 col-md-12" style="text-align: center;z-index: 5">
                        <button type="button" class="close" aria-label="Close" style="float: right;font-size: 30px" id="close_form">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <br>
                        <h1 id="subitle"> Enviar Encuesta </h1>
                    </div>
                </div>

                <div class="row justify-content-center" style="height: 68%;z-index: 0; padding: 0.1px;" id="imgT">
                    <div class="col-md-12 mt-3" style="text-align: center;" align="center">
                       
                                        <div class="row justify-content-center" style="height:50px; padding: 0.1px;"> 
                                                <div style="width:400px;background-color:white;display:flex;justify-content:space-around;" class=form-inline >
                                                    <div class="col-md-8 col-sm-12">
                                                        <input type="text" class="form-control" id="link">
                                                    </div>
                                                    <div class="col-md-4 col-sm-12">
                                                    <button id="copy-btn" class="btn btn-info" type="button" onclick="copyFunction()">Copiar Link</button>
                                                    </div>
                                                    
                                                    
                                                </div>
                                        </div>
          
            
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="row p-1">
            <h2 class="fw-bolder">Bienvenido</h2>
            <h1 class="text-green display-1 fw-bolder"><?= ucfirst($this->session->userdata('user_name'));?></h1>
            <a class="nav-link" href="<?= site_url('/create-survey');?>">
                <button id="new_form" class="btn btn-sm bg-green">Nueva Encuesta +</button>
            </a>
        </div>
    </div>
    <div class="container-fluid" style="padding: 0px;" >
        <div style="display:none;width:100%;height:100%;text-align:center;margin:0px;" id="messages" class="alert alert-success">
            <?php if( $this->session->flashdata('delete-success') ): ?>
                <script> 
                    $('#messages').css('display','block'); 
                    $('#messages').removeClass('alert-danger').addClass('alert-success');
                </script>
                <?= $this->session->flashdata('delete-success'); ?>
            <?php endif; ?>
            <?php if( $this->session->flashdata('create-success') ): ?>
                <script> 
                    $('#messages').css('display','block'); 
                    $('#messages').removeClass('alert-danger').addClass('alert-success');
                </script>
                <?= $this->session->flashdata('create-success'); ?>
            <?php endif; ?>
            <?php if ( $this->session->flashdata('username_update') ): ?>
                <script> 
                    $('#messages').css('display','block'); 
                    $('#messages').removeClass('alert-danger').addClass('alert-success');
                </script>
                <?= $this->session->flashdata('username_update'); ?>
            <?php endif; ?>
            <script> 
                setTimeout(function(){
                    $('#messages').fadeOut('slow');
                },5000);
            </script>
        </div>

        <div class="container">
            <div class="row justify-content-center" id="cards_here">
                            <!-- Loop -->
                            <?php $cpt=1;?>
                            <?php foreach( $question_forms as $question_form ): ?>

                                <div class="col-md-3 col-12 my-4 p-1">

                                    <div class="card boder-0 shadow-sm h-100">
                                        <div class="card-header bg-blue py-4">
                                            <h4 class="fw-bolder"> <?= $question_form['title'] ;?> </h4>
                                            <p class="profession"></p>
                                            <p class="fw-bolder"><?= 'Objetivo: '.$question_form['objective']?> </p>
                                            <p class="fw-bolder"><?= 'Descripción: '.$question_form['description']?> </p>
                                            <p class="fw-bolder"><?= 'Creado: ' . $question_form['created_at'] ;?></p>
                                            <p>Tienes <?= $question_form['notifications'] ;?> respuestas nuevas</p>
                                        </div>

                                        <div class="card-body py-4">
                                            <div class="row justify-content-center">

                                                <div class="col text-center">
                                                    <h2><a href="<?= site_url('view-survey/').$question_form['id'];?>" ><i class="far fa-chart-bar" style="color:blue;cursor: pointer;"></i></a></h2>
                                                    <p>Ver</p>
                                                </div>

                                                <div class="col text-center">
                                                    <form id="<?= $question_form['id'];?>">
                                                        <button type='input' id="btn-send" style="outline:none;border:none;background:none;">
                                                            <h2><i class="fas fa-paper-plane send_surv" style="color:green;cursor: pointer;"></i></h2>
                                                        Compartir
                                                        </button>
                                                    </form>

                                                    <script> 

                                                    $(document).ready(function(){
                                                        $('#<?= $question_form['id'];?>').submit(function(e){
                                                            e.preventDefault();
                                                            id = <?= $question_form['id']; ?>;
                                                            uuid = '<?= $question_form['uuid']; ?>';
                                                            $('#link').val(`<?=$url;?>/answer-survey/${uuid}`);
                                                        });
                                                    });

                                                    </script>
                                                                
                                                </div>
                                                <div class="col text-center">
                                                    <?= form_open('surveys/delete_question_form'); ?>
                                                        <input type="hidden" name="id" value="<?= $question_form['id'];?>">
                                                        <button type="submit" style="outline:none;border:none;background:none;">
                                                            <h2><i class="fas fa-times" style="color:red;cursor: pointer;"></i></h2>
                                                        Suprimir
                                                        </button>
                                                    <?= form_close(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <!-- End of Loop -->
                    </div> 
        </div>
        
    </div>
</div>


 

<script type="text/javascript" src="<?= base_url('assets/js/tagsinput.js');?>"></script>


$( document ).ready(function() {
    $("#load").fadeOut(800);
    $("body").css("overflow", "visible");
    
});


$("#answers").click(function(){

	$("#answers").css({"background-color": "white","color":"#0079ca"});

	$("#summary").css({"background-color": "#0079ca","color":"white"});

	$("#survey").css({"background-color": "#24345c","color":"white"});

  $("#survey_container").fadeOut();
  $("#summary_container").fadeOut();
  $("#answers_container").fadeIn();
})

$("#survey").click(function(){

	$("#answers").css({"background-color": "#7c942c","color":"white"});

	$("#summary").css({"background-color": "#0079ca","color":"white"});

	$("#survey").css({"background-color": "white","color":"#0079ca"});

  $("#answers_container").fadeOut();
  $("#summary_container").fadeOut();
  $("#survey_container").fadeIn();
  $('.carousel').carousel({
    interval: false,
  });
  
})

$("#summary").click(function(){

	$("#answers").css({"background-color": "#7c942c","color":"white"});

	$("#summary").css({"background-color": "white","color":"#0079ca"});

	$("#survey").css({"background-color": "#24345c","color":"white"});

  $("#survey_container").fadeOut();
  $("#answers_container").fadeOut();
  $("#summary_container").fadeIn();
})

$( function() {
	$( "#container_add" ).draggable();
});




$( function() {
    $( "#container_add" ).draggable();
});


$("#close_form").click(function(){
  $("#theme_form").fadeOut();
});

$("#theme").click(function(){
  $("#theme_form").fadeIn();
});


mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  $('html,body').animate({ scrollTop: 0 }, 'slow');
}



/* IMAGE INPUT HANDLE*/

$("#proj_img").click(function() {
    $("input[id='my_file']").click();
});


/* -------------------  FORM ADD HANDLE -------------------- */

/* ADD AN MCQ */
$(".Q").click(function(){
  if($(this).attr('id')=="MCQ"){
    let html = '';
    html += ` <div class="container-fluid mt-3" id=content_here${question_nb} style="width: 100%;height: 270px;" >`;
    html += `<div class="row justify-content-center mb-3 " id=question_nb${question_nb} style="height: 360px;margin-top: 5px;display:none;">`;
    html += `<div class="col-md-6 col-lg-5 col-xl-4 col-12 shadow" style="height: 70%;background-color: white;margin-top: 10px" id=mcq_container${question_nb}>`;
    html += `<div class="row justify-content-end"><button type="button" class="close" aria-label="Close" style="float: right;" id=Del_Q${question_nb}> `;
    html += `<span aria-hidden="true">&times;</span>`;
    html += `</button>`;
    html += `</div>`;
    html += `<div class="row justify-content-center" style="height: 70px;">`;
    html += `<div class="group" > `;
    html += `<input type="text" class="qTitle" class="shadow" maxlength="70" id=question${question_nb} required> `;
    html += `<span class="highlight"></span> <span class="bar"></span>`;
    html += `<label class="label" style="left: 32%" >Pregunta <i class="far fa-dot-circle" style="color: #007bff"></i> </label> `;
    html += `</div>`;
    html += `</div>`;
    html += `<div class="row justify-content-center" style="height: 50px;" id=mcq_content${question_nb}>`;
    html += `<div class="group se" > `;
    html += `<i class="far fa-circle" style="float: left;font-size: 30px;margin-top: 10px;margin-right: 10px;color: #0079ca;margin-left: 5px"></i> `;
    html += `<input type="text" class="shadow qOption" id=option${option_nb} maxlength="30" style="height: 30px;margin-top: 10px;" required> `;
    html += `<span class="highlight"></span> `;
    html += `<span class="bar" style="background:red;margin-left: 45px;"></span> `;
    html += `<label class="label" >Option </label> `;
    html += `</div> `;
    html += `<button type="button" class="Del_OptQ close" id=Del_mcq_question${question_nb}_option${option_nb} aria-label="Close" style="margin-left: 10px;margin-top: -10px"> `;
    html += `<span aria-hidden="true">&times;</span></button> `;
    html += `</div>`;
    html += `<div class="row justify-content-center" style="height: 50px;margin-top: 20px" id="mcq_footer">`;
    html += `<button class="btn btn-success mcq" id=add_opt${question_nb} style="height: 50px;font-weight: bold;margin-left: 32%">Agregar</button>`;
    html += `<label class="switch" style="margin-left: 27%;margin-top: 25px"> `;
    html += `<input id=question${question_nb}required type="checkbox" checked> <span class="slider round"></span>`; 
    html += `<p style="margin-top: 20px;margin-left: -5px;font-size: 12px;color: rgb(24,24,24);">Requerida</p>`;
    html += `</label>`;
    html += `</div>`;
    html += `</div>`;
    html += `</div>`;
    html += `</div>`;
    $("#question_container").append(html);
    questions[question_nb] = ['mcq' , `question${question_nb}` , `question${question_nb}required` , `option${option_nb}`];
  }
  
  else if($(this).attr('id')=="CXQ"){
    let html = '';
    html += `<div class="container-fluid mt-3" id=content_here${question_nb} style="width: 100%;height: 270px;" >`;
    html += `<div class="row justify-content-center mb-3 " id=question_nb${question_nb} style="height: 360px;margin-top: 5px;display:none;">`;
    html += `<div class="col-md-6 col-lg-5 col-xl-4 col-12 shadow" style="height: 70%;background-color: white;margin-top: 10px" id=mcq_container${question_nb}>`;
    html += `<div class="row justify-content-end">`;
    html += `<button type="button" class="close" aria-label="Close" style="float: right;" id=Del_Q${question_nb}> `;
    html += `<span aria-hidden="true">&times;</span>`;
    html += `</button>`;
    html += `</div>`;
    html += `<div class="row justify-content-center" style="height: 70px;"><div class="group" > `;
    html += `<input type="text" id=question${question_nb} class="qTitle" class="shadow" maxlength="70" required> `;
    html += `<span class="highlight"></span> `;
    html += `<span class="bar"></span> `;
    html += `<label class="label" style="left: 32%" >Pregunta <i class="far fa-check-square" style="color: #007bff"></i> </label> `;
    html += `</div>`;
    html += `</div>`;
    html += `<div class="row justify-content-center" style="height: 50px;background-color: white;" id=mcq_content${question_nb}>`;
    html += `<div class="group se" > `;
    html += `<i class="far fa-square" style="float: left;font-size: 30px;margin-top: 10px;margin-right: 10px;color: #0079ca;margin-left: 5px"></i> `;
    html += `<input type="text" id=option${option_nb} class="shadow qOption" maxlength="30" style="height: 30px;margin-top: 10px;" required> `;
    html += `<span class="highlight"></span> <span class="bar" style="background:red;margin-left: 45px;"></span> `;
    html += `<label class="label" >Option </label> `;
    html += `</div> `;
    html += `<button type="button" class="Del_OptQ close" id=Del_mcq_question${question_nb}_option${option_nb} aria-label="Close" style="margin-left: 10px;margin-top: -10px"> `;
    html += `<span aria-hidden="true">&times;</span>`;
    html += `</button> `;
    html += `</div>`;
    html += `<div class="row justify-content-center" style="height: 50px;margin-top: 20px" id="mcq_footer">`;
    html += `<button class="btn btn-success cxq" id=add_opt${question_nb} style="height: 50px;font-weight: bold;margin-left: 32%">Agregar</button>`;
    html += `<label class="switch" style="margin-left: 27%;margin-top: 25px"> `;
    html += `<input id=question${question_nb}required type="checkbox" checked> <span class="slider round"></span> `;
    html += `<p style="margin-top: 20px;margin-left: -5px;font-size: 12px;color: rgb(24,24,24);">Requerida</p>`;
    html += `</label>`;
    html += `</div>`;
    html += `</div>`;
    html += `</div>`;
    html += `</div>`;
    $("#question_container").append(html);
    questions[question_nb] = ['checkbox' , `question${question_nb}` , `question${question_nb}required` , `option${option_nb}`];
  }
  else if($(this).attr(`id`)=="OQ"){
    let html = ``;
    html += `<div class="container-fluid mt-3" id=content_here${question_nb} style="width: 100%;height: 210px" >`;
    html += `<div class="row justify-content-center mb-3 " id=question_nb${question_nb} style="height: 360px;margin-top: 5px;display:none;">`;
    html += `<div class="col-md-6 col-lg-5 col-xl-4 col-12 shadow" style="height: 50%;background-color: white;margin-top: 10px" id=mcq_container${question_nb}>`;
    html += `<div class="row justify-content-end">`;
    html += `<button type="button" class="close" aria-label="Close" style="float: right;" id=Del_Q${question_nb}> `;
    html += `<span aria-hidden="true">&times;</span>`;
    html += `</button>`;
    html += `</div>`;
    html += `<div class="row justify-content-center" style="height: 70px;">`;
    html += `<div class="group" > `;
    html += `<input id=question${question_nb} type="text" class="qTitle" class="shadow" maxlength="70" required> `;
    html += `<span class="highlight"></span> <span class="bar"></span> `;
    html += `<label class="label" style="left: 32%" > Pregunta <i class="fas fa-question" style="color: #007bff"></i> </label>`; 
    html += `</div>`;
    html += `</div>`;
    html += `<div class="row justify-content-center" style="height: 50px;margin-top: 20px" id="mcq_footer">`;
    html += `<label class="switch" style="margin-left: 80%;margin-top: 25px"> `;
    html += `<input id=question${question_nb}required type="checkbox" checked> <span class="slider round"></span> `;
    html += `<p style="margin-top: 20px;margin-left: -5px;font-size: 12px;color: rgb(24,24,24);">Requerida</p>`;
    html += `</label>`;
    html += `</div>`;
    html += `</div>`;
    html += `</div>`;
    html += `</div>`;
    $("#question_container").append(html);
    questions[question_nb] = ['open' , `question${question_nb}` , `question${question_nb}required`]; 
  }
  else if($(this).attr(`id`)=="DATEQ"){
    let html = ``;
    html += `<div class="container-fluid mt-3" id=content_here${question_nb} style="width: 100%;height: 210px" >`;
    html += `<div class="row justify-content-center mb-3 " id=question_nb${question_nb} style="height: 360px;margin-top: 5px;display:none;">`;
    html += `<div class="col-md-6 col-lg-5 col-xl-4 col-12 shadow" style="height: 50%;background-color: white;margin-top: 10px" id=mcq_container${question_nb}>`;
    html += `<div class="row justify-content-end">`;
    html += `<button type="button" class="close" aria-label="Close" style="float: right;" id=Del_Q${question_nb}> `;
    html += `<span aria-hidden="true">&times;</span>`;
    html += `</button>`;
    html += `</div>`;
    html += `<div class="row justify-content-center" style="height: 70px;">`;
    html += `<div class="group" > `;
    html += `<input id=question${question_nb} type="text" class="qTitle" class="shadow" maxlength="70" required> `;
    html += `<span class="highlight"></span> <span class="bar"></span> `;
    html += `<label class="label" style="left: 32%" > Pregunta <i class="far fa-calendar-alt" style="color: #007bff"></i></label> `;
    html += `</div>`;
    html += `</div>`;
    html += `<div class="row justify-content-center" style="height: 50px;margin-top: 20px" id="mcq_footer">`;
    html += `<label class="switch" style="margin-left: 80%;margin-top: 25px"> `;
    html += `<input id=question${question_nb}required type="checkbox" checked> <span class="slider round"></span> `;
    html += `<p style="margin-top: 20px;margin-left: -5px;font-size: 12px;color: rgb(24,24,24);">Requerida</p>`;
    html += `</label>`;
    html += `</div>`;
    html += `</div>`;
    html += `</div>`;
    html += `</div>`;
    $("#question_container").append(html);
    questions[question_nb] = ['date' , `question${question_nb}` , `question${question_nb}required`]; 
  }

  else if($(this).attr(`id`)=="TIMEQ"){
    let html = ``;
    html += `<div class="container-fluid mt-3" id=content_here${question_nb} style="width: 100%;height: 210px" >`;
    html += `<div class="row justify-content-center mb-3 " id=question_nb${question_nb} style="height: 360px;margin-top: 5px;display:none;">`;
    html += `<div class="col-md-4 shadow" style="height: 50%;background-color: white;margin-top: 10px" id=mcq_container${question_nb}>`;
    html += `<div class="row justify-content-end">`;
    html += `<button type="button" class="close" aria-label="Close" style="float: right;" id=Del_Q${question_nb}> `;
    html += `<span aria-hidden="true">&times;</span>`;
    html += `</button>`;
    html += `</div>`;
    html += `<div class="row justify-content-center" style="height: 70px;">`;
    html += `<div class="group" > `;
    html += `<input type="text" id=question${question_nb} class="qTitle" class="shadow" maxlength="70" required> `;
    html += `<span class="highlight"></span> <span class="bar"></span> `;
    html += `<label class="label" style="left: 32%" > Pregunta <i class="far fa-clock" style="color: #007bff"></i></label> `;
    html += `</div>`;
    html += `</div>`;
    html += `<div class="row justify-content-center" style="height: 50px;margin-top: 20px" id="mcq_footer">`;
    html += `<label class="switch" style="margin-left: 80%;margin-top: 25px"> `;
    html += `<input id=question${question_nb}required type="checkbox" checked > <span class="slider round"></span> `;
    html += `<p style="margin-top: 20px;margin-left: -5px;font-size: 12px;color: rgb(24,24,24);">Requerida</p>`;
    html += `</label>`;
    html += `</div>`;
    html += `</div>`;
    html += `</div>`;
    html += `</div>`;
    $("#question_container").append(html);
    questions[question_nb] = ['time' , `question${question_nb}` , `question${question_nb}required`]; 
 
  }else if($(this).attr(`id`)=="VALQ"){
    let html = ``;
    html += `<div class="container-fluid mt-3" id="content_here${question_nb}">
    <div class="row justify-content-center mb-3 " id="question_nb${question_nb}">
        <div class="col-lg-4 col-10" id="mcq_container${question_nb}">
            <div class="card border-0 shadow-sm bg-light px-4 d-flex my-4">
                <button type="button" class="btn-close my-2 ms-auto btn-sm close" aria-label="Close"
                    id="Del_Q${question_nb}"></button>
  
                <div class="row align-items-center my-2">
                    <div class="col-8">
                        <input class="form-control qTitle" type="text" id="question${question_nb}">
                    </div>
                    <div class="col-4">
                        <label for="">Pregunta</label>
                        <i class="bi bi-star-fill"></i>
                    </div>
                </div>
  
                <div class="row align-items-center my-2 py-4 px-2" id="mcq_footer">
                    <div class="col d-flex align-items-center gap-2 justify-content-end" id="mcq_footer">
                            <label class="switch">
                            <input id="question${question_nb}" required type="checkbox" checked> <span
                                class="slider round"></span>Requerida
                        </label>
                    </div>
                </div>
  
            </div>
        </div>
    </div>
  </div>`;
    $("#question_container").append(html);
    questions[question_nb] = ['valoration' , `question${question_nb}` , `question${question_nb}required`]; 
  
  }else{
    let html = ``;
    html += `<div class="container-fluid mt-3" id=content_here${question_nb} style="width: 100%;height: 210px" >`;
    html += `<div class="row justify-content-center mb-3 " id=question_nb${question_nb} style="height: 360px;margin-top: 5px;display:none;">`;
    html += `<div class="col-md-4 shadow" style="height: 50%;background-color: white;margin-top: 10px" id=mcq_container${question_nb}>`;
    html += `<div class="row justify-content-end">`;
    html += `<button type="button" class="close" aria-label="Close" style="float: right;" id=Del_Q${question_nb}> `;
    html += `<span aria-hidden="true">&times;</span>`;
    html += `</button>`;
    html += `</div>`;
    html += `<div class="row justify-content-center" style="height: 70px;">`;
    html += `<div class="group" > `;
    html += `<input type="text" id=question${question_nb} class="qTitle" class="shadow" maxlength="70" required> `;
    html += `<span class="highlight"></span> <span class="bar"></span> `;
    html += `<label class="label" style="left: 32%" > Pregunta <i class="fas fa-ruler-horizontal" style="color: #007bff"></i></label> `;
    html += `</div>`;
    html += `</div>`;
    html += `<div class="row justify-content-center" style="height: 50px;margin-top: 20px" id="mcq_footer">`;
    html += `<label class="switch" style="margin-left: 80%;margin-top: 25px"> `;
    html += `<input id=question${question_nb}required type="checkbox" checked> `;
    html += `<span class="slider round"></span> `;
    html += `<p style="margin-top: 20px;margin-left: -5px;font-size: 12px;color: rgb(24,24,24);">Requerida</p>`;
    html += `</label>`;
    html += `</div>`;
    html += `</div>`;
    html += `</div>`;
    html += `</div>`;
    $("#question_container").append(html);
    questions[question_nb] = ['range' , `question${question_nb}` , `question${question_nb}required`]; 

  }
  
  $("#question_nb"+question_nb).fadeIn();
  question_nb++;
  option_nb++;

});




/* DELETE A FORM */
$(document).on('click', "[id^='Del_Q']", function(){


  Id = $(this).attr('id').replace(/Del_Q/, ''); //Get Question ID

  $("#content_here"+Id).animate({height:0},500, function() { $(this).remove(); });

  // delete object attribute
  delete questions[Id];

});


/* ADD A FORM OPTION */
$(document).on('click', "[id^='add_opt']", function(){


    Id = $(this).attr('id').replace(/add_opt/, ''); //Get Q ID Number

    QType = $(this).attr('class').replace(/btn btn-success /, '');

    // add option id to array
    
    if ( questions[Id].length < 13 ){ // Condition Size
      if(QType=="mcq"){

        $("#mcq_container"+[Id]).animate({height: $("#mcq_container"+[Id]).height()+80});

        $("#content_here"+[Id]).animate({height: $("#content_here"+[Id]).height()+80});

        $("#mcq_content"+[Id]).animate({height: $("#mcq_content"+[Id]).height()+80});
        
        let html = '';
        html += `<div class="group se" > `;
        html += `<i class="far fa-circle" style="float: left;font-size: 30px;margin-top: 10px;margin-right: 10px;color:#0079ca;margin-left: 5px"></i> `;
        html += `<input id=option${option_nb} type="text" class="shadow qOption" maxlength="30" style="height: 30px;margin-top: 10px;" required> `;
        html += `<span class="highlight" ></span> `;
        html += `<span class="bar" style="background:red;margin-left: 45px;"></span> `;
        html += `<label class="label" >Option </label> `;
        html += `</div> `;
        html += `<button type="button" class="Del_OptQ close" id=Del_mcq_question${Id}_option${option_nb} aria-label="Close" style="margin-left: 10px;margin-top: -10px" > `;
        html += `<span aria-hidden="true">&times;</span>`;
        html += `</button>`;

        $("#mcq_content"+[Id]).append(html);

      }
      else if(QType=="cxq"){

        $("#mcq_container"+[Id]).animate({height: $("#mcq_container"+[Id]).height()+80});

        $("#content_here"+[Id]).animate({height: $("#content_here"+[Id]).height()+80});

        $("#mcq_content"+[Id]).animate({height: $("#mcq_content"+[Id]).height()+80});

        let html = '';
        html += `<div class="group se" > `;
        html += `<i class="far fa-square" style="float: left;font-size: 30px;margin-top: 10px;margin-right: 10px;color:#0079ca;margin-left: 5px"></i> `;
        html += `<input id=option${option_nb} type="text" class="shadow qOption" maxlength="30" style="height: 30px;margin-top: 10px;" required> `;
        html += `<span class="highlight" ></span> `;
        html += `<span class="bar" style="background:red;margin-left: 45px;"></span> `;
        html += `<label class="label" >Option </label> `;
        html += `</div> `;
        html += `<button type="button" class="Del_OptQ close" id=Del_mcq_question${Id}_option${option_nb} aria-label="Close" style="margin-left: 10px;margin-top: -10px"> `;
        html += `<span aria-hidden="true">&times;</span>`;
        html += `</button>`;

        $("#mcq_content"+[Id]).append(html); 

      }
      
      questions[Id].push(`option${option_nb}`);
      option_nb++;
      
    }else{
      alert("maximum Questions reached");
    }

});

/* DELETE A FORM OPTION */

$(document).on('click', "[class^='Del_OptQ']", function(){
    data = $(this).prev('.group');
    let id = $(this).closest("[id^='mcq_container']");
    id = id.attr('id');
    id = id.replace(/mcq_container/, '');

    data.remove();//removes cross
    $("#mcq_content"+[id]).animate({height: $("#mcq_content"+[id]).height()-80});
    $("#mcq_container"+[id]).animate({height: $("#mcq_container"+[id]).height()-80});
    $("#content_here"+[id]).animate({height: $("#content_here"+[id]).height()-80});
      
    // Delete option from array
    // Del_mcq_question1_option2
    id  = $(this).attr('id').replace(/Del_mcq_question/ , '').replace(/_option([0-9])*/ , '');
    let op = $(this).attr('id').replace(/Del_mcq_question([0-9])*_option/ , '');
    let s = `option${op}`;
    questions[id].splice( questions[id].indexOf( s , 1 ) , 1 );
    $(this).remove();

  });

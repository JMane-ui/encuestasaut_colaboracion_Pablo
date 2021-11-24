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
  html += ` <div class="container-fluid mt-3" id="content_here${question_nb}">
  <div class="row justify-content-center mb-3 " id="question_nb${question_nb}">
      <div class="col-lg-6 col-10" id="mcq_container${question_nb}">
          <div class="card border-0 shadow-sm bg-light px-4 d-flex my-4">
              <button type="button" class="btn-close my-2 ms-auto btn-sm close" aria-label="Close"
                  id="Del_Q${question_nb}"></button>

              <div class="row align-items-center my-2">
                  <div class="col">
                      <input class="form-control qTitle" type="text" id="question${question_nb}">
                  </div>
                  <div class="col">
                      <label for="">Pregunta</label>
                      <i class="bi bi-check-circle"></i>
                  </div>
              </div>

              <div class="row align-items-center my-2" id="mcq_content${question_nb}">
                <div class="form-group group se">
                      <div class="col d-flex align-items-center gap-2">
                          <i class="bi bi-circle"></i>
                          <input class="form-control qOption" type="text" id="option${option_nb}" maxlength="30" required>
                          <label for="">Opción</label>
                        </div>
                </div>
                      
                <button id="Del_mcq_question${question_nb}_option${option_nb}" class="Del_OptQ close btn text-danger text-end"
                type="button"><i class="bi bi-trash-fill"></i></button>
              </div>
              

              <div class="row align-items-center my-2 py-4" id="mcq_footer">
                  <div class="col d-flex align-items-center gap-2" id="mcq_footer">
                  <button class="btn btn-success mcq" id="add_opt${question_nb}" style="background-color:#7c942c !important; font-size:14px;">+ Agregar</button>
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
  questions[question_nb] = ['mcq' , `question${question_nb}` , `question${question_nb}required` , `option${option_nb}`];
}

else if($(this).attr('id')=="CXQ"){
  let html = '';
  html += `<div class="container-fluid mt-3" id="content_here${question_nb}">
  <div class="row justify-content-center mb-3 " id="question_nb${question_nb}">
      <div class="col-lg-6 col-10" id="mcq_container${question_nb}">
          <div class="card border-0 shadow-sm bg-light px-4 d-flex my-4">
              <button type="button" class="btn-close my-2 ms-auto btn-sm close" aria-label="Close"
                  id="Del_Q${question_nb}"></button>

              <div class="row align-items-center my-2">
                  <div class="col">
                      <input class="form-control qTitle" type="text" id="question${question_nb}">
                  </div>
                  <div class="col">
                      <label for="">Pregunta</label>
                      <i class="bi bi-check-square"></i>
                  </div>
              </div>

              <div class="row align-items-center my-2" id="mcq_content${question_nb}">
                <div class="form-group group se">
                      <div class="col d-flex align-items-center gap-2">
                          <i class="bi bi-square"></i>
                          <input class="form-control qOption" type="text" id="option${option_nb}" maxlength="30" required>
                          <label for="">Opción</label>
                        </div>
                </div>
                      
                <button id="Del_mcq_question${question_nb}_option${option_nb}" class="Del_OptQ close btn text-danger text-end"
                type="button"><i class="bi bi-trash-fill"></i></button>
              </div>
              

              <div class="row align-items-center my-2 py-4" id="mcq_footer">
                  <div class="col d-flex align-items-center gap-2" id="mcq_footer">
                  <button class="btn btn-success cxq" id="add_opt${question_nb}" style="background-color:#7c942c !important; font-size:14px;">+ Agregar</button>
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
  questions[question_nb] = ['checkbox' , `question${question_nb}` , `question${question_nb}required` , `option${option_nb}`];
}
else if($(this).attr(`id`)=="OQ"){
  let html = ``;
  html += `<div class="container-fluid mt-3" id="content_here${question_nb}">
  <div class="row justify-content-center mb-3 " id="question_nb${question_nb}">
      <div class="col-lg-6 col-10" id="mcq_container${question_nb}">
          <div class="card border-0 shadow-sm bg-light px-4 d-flex my-4">
              <button type="button" class="btn-close my-2 ms-auto btn-sm close" aria-label="Close"
                  id="Del_Q${question_nb}"></button>

              <div class="row align-items-center my-2">
                  <div class="col-8">
                      <input class="form-control qTitle" type="text" id="question${question_nb}">
                  </div>
                  <div class="col-4">
                      <label for="">Pregunta</label>
                      <i class="bi bi-question"></i>
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
  questions[question_nb] = ['open' , `question${question_nb}` , `question${question_nb}required`]; 
}
else if($(this).attr(`id`)=="DATEQ"){
  let html = ``;
  html += `<div class="container-fluid mt-3" id="content_here${question_nb}">
  <div class="row justify-content-center mb-3 " id="question_nb${question_nb}">
      <div class="col-lg-6 col-10" id="mcq_container${question_nb}">
          <div class="card border-0 shadow-sm bg-light px-4 d-flex my-4">
              <button type="button" class="btn-close my-2 ms-auto btn-sm close" aria-label="Close"
                  id="Del_Q${question_nb}"></button>

              <div class="row align-items-center my-2">
                  <div class="col-8">
                      <input class="form-control qTitle" type="text" id="question${question_nb}">
                  </div>
                  <div class="col-4">
                      <label for="">Pregunta</label>
                      <i class="bi bi-calendar4-event"></i>
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
  questions[question_nb] = ['date' , `question${question_nb}` , `question${question_nb}required`]; 
}

else if($(this).attr(`id`)=="TIMEQ"){
  let html = ``;
  html += `<div class="container-fluid mt-3" id="content_here${question_nb}">
  <div class="row justify-content-center mb-3 " id="question_nb${question_nb}">
      <div class="col-lg-6 col-10" id="mcq_container${question_nb}">
          <div class="card border-0 shadow-sm bg-light px-4 d-flex my-4">
              <button type="button" class="btn-close my-2 ms-auto btn-sm close" aria-label="Close"
                  id="Del_Q${question_nb}"></button>

              <div class="row align-items-center my-2">
                  <div class="col-8">
                      <input class="form-control qTitle" type="text" id="question${question_nb}">
                  </div>
                  <div class="col-4">
                      <label for="">Pregunta</label>
                      <i class="bi bi-clock"></i>
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
  questions[question_nb] = ['time' , `question${question_nb}` , `question${question_nb}required`]; 

}else if($(this).attr(`id`)=="VALQ"){
  let html = ``;
  html += `<div class="container-fluid mt-3" id="content_here${question_nb}">
  <div class="row justify-content-center mb-3 " id="question_nb${question_nb}">
      <div class="col-lg-6 col-10" id="mcq_container${question_nb}">
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
  html += `<div class="container-fluid mt-3" id="content_here${question_nb}">
  <div class="row justify-content-center mb-3 " id="question_nb${question_nb}">
      <div class="col-lg-6 col-10" id="mcq_container${question_nb}">
          <div class="card border-0 shadow-sm bg-light px-4 d-flex my-4">
              <button type="button" class="btn-close my-2 ms-auto btn-sm close" aria-label="Close"
                  id="Del_Q${question_nb}"></button>

              <div class="row align-items-center my-2">
                  <div class="col-8">
                      <input class="form-control qTitle" type="text" id="question${question_nb}">
                  </div>
                  <div class="col-4">
                      <label for="">Pregunta</label>
                      <i class="bi bi-arrow-left-right"></i>
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

  // + Agregar id to array
  
  if ( questions[Id].length < 13 ){ // Condition Size
    if(QType=="mcq"){

      $("#mcq_container"+[Id]).animate({height: $("#mcq_container"+[Id]).height()+80});

      $("#content_here"+[Id]).animate({height: $("#content_here"+[Id]).height()+80});

      $("#mcq_content"+[Id]).animate({height: $("#mcq_content"+[Id]).height()+80});
      
      let html = '';
      html += `<div class="form-group group se">
      <div class="col d-flex align-items-center gap-2">
          <i class="bi bi-circle"></i>
          <input class="form-control qOption" type="text" id="option${option_nb}" maxlength="30" required>
          <label for="">Opción</label>
        </div>
      </div>`;
      html += `<button type="button" class="Del_OptQ close btn text-danger text-end" id=Del_mcq_question${Id}_option${option_nb} aria-label="Close"> `;
      html += `<i class="bi bi-trash-fill"></i>`;
      html += `</button>`;

      $("#mcq_content"+[Id]).append(html);

    }
    else if(QType=="cxq"){

      $("#mcq_container"+[Id]).animate({height: $("#mcq_container"+[Id]).height()+80});

      $("#content_here"+[Id]).animate({height: $("#content_here"+[Id]).height()+80});

      $("#mcq_content"+[Id]).animate({height: $("#mcq_content"+[Id]).height()+80});

      let html = '';
      html += `<div class="form-group group se">
      <div class="col d-flex align-items-center gap-2">
          <i class="bi bi-square"></i>
          <input class="form-control qOption" type="text" id="option${option_nb}" maxlength="30" required>
          <label for="">Opción</label>
        </div>
      </div>`;
      html += `<button type="button" class="Del_OptQ close btn text-danger text-end" id=Del_mcq_question${Id}_option${option_nb} aria-label="Close"> `;
      html += `<i class="bi bi-trash-fill"></i>`;
      html += `</button>`;

      $("#mcq_content"+[Id]).append(html); 

    }
    
    questions[Id].push(`option${option_nb}`);
    option_nb++;
    
  }else{
    alert("maximum Questions reached");
  }

});

/* DELETE A FORM */
$(document).on('click', "[id^='Del_Q']", function(){


  Id = $(this).attr('id').replace(/Del_Q/, ''); //Get Question ID

  $("#content_here"+Id).animate({height:0},500, function() { $(this).remove(); });

  // delete object attribute
  delete questions[Id];

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

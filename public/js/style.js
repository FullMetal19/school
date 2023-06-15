
    

    let btn_close_popup_scolar = document.getElementById('btn_close_popup_scolar');
    let blog_modale = document.querySelector('.blog_modale');
    let btn_add_admin = document.getElementById('btn_add_admin'); 
    
    btn_close_popup_scolar.addEventListener('click' , ()=>{
        blog_modale.style.display="none";
    });
    
    btn_add_admin.addEventListener('click' , ()=>{
        blog_modale.style.display="block";
    });
    
    
    
    
    let btn_option1 = document.getElementById("btn_option1");
    let btn_option2 = document.getElementById("btn_option2");
    let btn_option3 = document.getElementById("btn_option3");
    let btn_option4 = document.getElementById("btn_option4");
    
    let option1 = document.querySelector(".option1");
    let option2 = document.querySelector(".option2");
    let option3 = document.querySelector(".option3");
    let option4 = document.querySelector(".option4");
    
    
    
    function f1(){
    option1.style.display="block";
    option2.style.display="none";
    option3.style.display="none";
    option4.style.display="none";
    btn_option1.style.borderBottom="4px solid brown";
    btn_option2.style.borderBottom="none";
    btn_option3.style.borderBottom="none";
    btn_option4.style.borderBottom="none";
    };
    
    function f2(){
    option1.style.display="none";
    option2.style.display="block";
    option3.style.display="none";
    option4.style.display="none";
    btn_option1.style.borderBottom="none";
    btn_option2.style.borderBottom="4px solid brown";
    btn_option3.style.borderBottom="none";
    btn_option4.style.borderBottom="none";
    };
    
    function f3(){
    option1.style.display="none";
    option2.style.display="none";
    option3.style.display="block";
    option4.style.display="none";
    btn_option1.style.borderBottom="none";
    btn_option2.style.borderBottom="none";
    btn_option3.style.borderBottom="4px solid brown";
    btn_option4.style.borderBottom="none";
    };
    
    function f4(){
    option1.style.display="none";
    option2.style.display="none";
    option3.style.display="none";
    option4.style.display="block";
    btn_option1.style.borderBottom="none";
    btn_option2.style.borderBottom="none";
    btn_option3.style.borderBottom="none";
    btn_option4.style.borderBottom="4px solid brown";
    };
    
    
    btn_option1.addEventListener('click', f1);
    btn_option2.addEventListener('click', f2);
    btn_option3.addEventListener('click', f3);
    btn_option4.addEventListener('click', f4);
    

    
    
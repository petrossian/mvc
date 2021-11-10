
let eml = localStorage.getItem('eml');
if(eml != undefined){
    document.getElementsByName('eml')[0].value = eml;
}

let pwd = localStorage.getItem('pwd');
if(pwd != undefined){
    document.getElementsByName('pwd')[0].value = pwd;
}


let username = localStorage.getItem('username');
if(username != undefined){
    document.getElementsByName('username')[0].value = username;
}

let email = localStorage.getItem('email');
if(email != undefined){
    document.getElementsByName('email')[0].value = email;
}

let password = localStorage.getItem('password');
if(password != undefined){
    document.getElementsByName('password')[0].value = password;
}

document.getElementById('open_upload_form').addEventListener('click', ()=>{
    document.getElementById('upload_form').style.display = "block";
    document.getElementById('close_upload_form').style.display = "inline-block";
    document.getElementById('open_upload_form').style.display = "none";
});



document.getElementById('file').addEventListener('change', (e)=>{
    console.log(e.target.files[0]);
    document.getElementById('file').style.display = "none";
    document.getElementById('btn_upload').style.display = "block";
    document.getElementById('btn_upload').style.marginLeft = "25%";
});

document.getElementById('close_upload_form').addEventListener('click', ()=>{
    document.getElementById('upload_form').style.display = "none";
    document.getElementById('close_upload_form').style.display = "none";
    document.getElementById('open_upload_form').style.display = "inline-block";
});




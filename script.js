const body = document.querySelector("body");
sidebar = body.querySelector("nav");

sidebarToggle = body.querySelector(".sidebar-toggle");

sidebarToggle.addEventListener("click",() => {

    sidebar.classList.toggle("close");
})


function showinput(ref){
    document.getElementById("title-update").value=document.getElementById(ref).getAttribute("title");
    document.getElementById("description-update").value=document.getElementById(ref).getAttribute("description");
    document.getElementById("date-update").value=document.getElementById(ref).getAttribute("date");
    document.getElementById("autor-update").value=document.getElementById(ref).getAttribute("autor");
    document.getElementById("category-update").value=document.getElementById(ref).getAttribute("category");
    document.getElementById("book-id-update").value = ref;
   
}

function lend(ref){
    document.getElementById("title-lend").value=document.getElementById(ref).getAttribute("title");
    document.getElementById("autor-lend").value=document.getElementById(ref).getAttribute("autor");
    document.getElementById("category-lend").value=document.getElementById(ref).getAttribute("category");
    document.getElementById("book-id-lend").value = ref;
   
}

function clearform(){
    
    document.forms['form_add_book'].reset();
}






import './bootstrap';

let featuredImgContainer = document.getElementById('featuredImgContainer');
let featuredImg = document.getElementById('featuredImg');
let multipleSelect = document.getElementById('multipleSelect');
let selectItem = document.querySelectorAll('#selectItem');
let deleteBtn = document.getElementById('deleteBtn');

if(featuredImgContainer){
    featuredImgContainer.addEventListener('click', ()=>{
        featuredImg.click();
    })
}

deleteBtn.classList.add("invisible");


if(multipleSelect){
    multipleSelect.addEventListener('click', ()=>{
        if(multipleSelect.checked === true){
            selectItem.forEach((e) => {
                e.checked=true;
                deleteBtn.classList.remove("invisible");
                deleteBtn.classList.add("visible");
            })
        }else{
            selectItem.forEach((e) => {
                e.checked=false;
                deleteBtn.classList.remove("visible");
                deleteBtn.classList.add("invisible");
            })
        }

    })
}

selectItem.forEach((e) => {
    e.addEventListener('click', (event)=>{
        if(e.checked === true){
            deleteBtn.classList.remove("invisible");
            deleteBtn.classList.add("visible");
        }else{
            deleteBtn.classList.remove("visible");
            deleteBtn.classList.add("invisible");
        }
    });
})



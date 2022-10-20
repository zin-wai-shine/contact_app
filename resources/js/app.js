import './bootstrap';

let featuredImgContainer = document.getElementById('featuredImgContainer');
let featuredImg = document.getElementById('featuredImg');
let multipleSelect = document.getElementById('multipleSelect');
let selectItem = document.querySelectorAll('#selectItem');
let itemPhoto = document.querySelectorAll('#itemPhoto');
let deleteBtn = document.getElementById('deleteBtn');

if(featuredImgContainer){
    featuredImgContainer.addEventListener('click', ()=>{
        featuredImg.click();
    })
}

/*if(featuredImg){
    featuredImg.addEventListener('change', (e)=>{
        let file = e.target.files[0];
        let read = new FileReader();
        read.readAsDataURL(file);
        read.onload = () =>{
            featuredImgContainer.innerHTML =
                `
                 <div class="upload__photo__container position-relative " id="featuredImgContainer" style="background-image:url(${read.result})">
                    <i class="fa fa-camera-alt absolute__icons"></i>
                    <input type="file" value="${file}" name="featuredImg" id="featuredImg" hidden>
                </div>
               `
        }
    })
}*/

deleteBtn.classList.add("invisible");


if(multipleSelect){
    multipleSelect.addEventListener('click', ()=>{

        if(multipleSelect.checked === true){
            selectItem.forEach((e) => {
                e.checked=true;
                itemPhoto.forEach(i => {
                    i.classList.remove('d-block')
                    i.classList.add('d-none');
                })
                e.classList.remove('d-none')
                e.classList.add('d-block')
                deleteBtn.classList.remove("invisible");
                deleteBtn.classList.add("visible");
            })
        }else{
            selectItem.forEach((e) => {
                e.checked=false;
                itemPhoto.forEach(i => {
                    i.classList.remove('d-none');
                    i.classList.add('d-block');
                });
                e.classList.remove('d-block')
                e.classList.add('d-none')
                deleteBtn.classList.remove("visible");
                deleteBtn.classList.add("invisible");
            })
        }

    })
}

selectItem.forEach((e) => {
    e.addEventListener('click', (event)=>{
        itemPhoto.forEach(i => {
            if(e.checked === true && e.value === event.target.value){
                e.classList.remove('d-none');
                e.classList.add('d-block');
                i.classList.remove('d-block')
                i.classList.add('d-none');
            }else{
                e.classList.remove('d-block');
                i.classList.remove('d-none');
                e.classList.add('d-none');
                i.classList.add('d-block')
            }
        })


        if(e.checked === true){
            deleteBtn.classList.remove("invisible");
            deleteBtn.classList.add("visible");
        }else{
            deleteBtn.classList.remove("visible");
            deleteBtn.classList.add("invisible");
        }
    });
});





import './bootstrap';
import Swal from "sweetalert2";

let featuredImgContainer = document.getElementById('featuredImgContainer');
let featuredImg = document.getElementById('featuredImg');
let editImage = document.getElementById('editImage');

let multipleSelect = document.getElementById('multipleSelect');
let selectItem = document.querySelectorAll('.selectItem');
let itemPhoto = document.querySelectorAll('#itemPhoto');

let selectDeleteContainer = document.getElementById('selectDeleteContainer');
let deleteBtn = document.getElementById('deleteBtn');
let multipleDeleteForm = document.getElementById('multipleDelete');
let selectHead = document.getElementById('selectHead');
let normalHead = document.getElementById('normalHead');
let noneSelect = document.getElementById('noneSelect');

let deleteItem = document.querySelectorAll('#deleteItem');
let deleteItemForm = document.getElementById("deleteItemForm");
let createImage = document.getElementById('createImage');

let csvInput = document.getElementById('csvInput');
let getCsvBtn = document.getElementById('getCsvFile');
let csvName = document.getElementById('csvName');

getCsvBtn.addEventListener('click', ()=>{
    csvInput.click();
    csvInput.addEventListener('change', (e) => {
        csvName.innerText = e.target.value;
    })
})



if(featuredImgContainer){
    featuredImgContainer.addEventListener('click', ()=>{
        featuredImg.click();
    })
}
if(featuredImg){
    featuredImg.addEventListener('change', (e)=>{
        let file = e.target.files[0];
        let read = new FileReader();
        read.readAsDataURL(file);
        read.onload = () =>{
            if(editImage){
                editImage.src = read.result;
            }
            if(createImage){
                createImage.src = read.result;
            }
        }
    })
}

selectDeleteContainer.classList.add("invisible");
selectHead.classList.add("invisible");

// Hide & Show Delete Btn . . . .
let selectedStatus = () => {
    let selectStatus = [];
    let counts={};
    for(let i = 0 ; i<selectItem.length; i++){
        selectStatus.push(selectItem[i].checked);
    }

    selectStatus.forEach(e => {
        counts[e] = (counts[e] || 0) + 1;
    })

    if(selectItem.length === counts.false){
        selectDeleteContainer.classList.remove("visible");
        selectDeleteContainer.classList.add("invisible");

/*        selectHead.classList.remove("d-block");
        selectHead.classList.add("d-none");

        normalHead.classList.remove("d-none");
        normalHead.classList.add("d-block");*/

        selectHead.classList.remove("visible");
        selectHead.classList.add("invisible");

        normalHead.classList.remove("invisible");
        normalHead.classList.add("visible");
    }

    // All Select Status. . . .
    if(selectItem.length !== counts.false){
        multipleSelect.checked = false;
    }
    if(selectItem.length === counts.true){
        multipleSelect.checked = true;
    }


}

// None Select
noneSelect.addEventListener('click', () => {
    selectItem.forEach(e => {
       e.checked = false;
    });

    selectDeleteContainer.classList.remove("visible");
    selectDeleteContainer.classList.add("invisible");

    selectHead.classList.remove("visible");
    selectHead.classList.add("invisible");

    normalHead.classList.remove("invisible");
    normalHead.classList.add("visible");
});

//Multiple Select , Hide & Show Btn
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
                selectDeleteContainer.classList.remove("invisible");
                selectDeleteContainer.classList.add("visible");

/*                selectHead.classList.remove("d-none");
                selectHead.classList.add("d-block");

                normalHead.classList.remove("d-block");
                normalHead.classList.add("d-none");*/

                selectHead.classList.remove("invisible");
                selectHead.classList.add("visible");

                normalHead.classList.remove("visible");
                normalHead.classList.add("invisible");
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
                selectDeleteContainer.classList.remove("visible");
                selectDeleteContainer.classList.add("invisible");

/*                selectHead.classList.remove("d-block");
                selectHead.classList.add("d-none");

                normalHead.classList.remove("d-none");
                normalHead.classList.add("d-block");*/

                selectHead.classList.remove("visible");
                selectHead.classList.add("invisible");

                normalHead.classList.remove("invisible");
                normalHead.classList.add("visible");
            })
        }

    })
}

/*selectItem.forEach((e) => {
    if(e.checked === true){
        console.log(e.value);
        deleteBtn.classList.add("visible");
        deleteBtn.classList.remove("invisible");
    }
    if(e.checked === false){
        deleteBtn.classList.remove('visible');
        deleteBtn.classList.add("invisible");
    }

   /!* itemPhoto.forEach(i => {
        if(e.checked === true && i.children[0])
    })*!/

    e.addEventListener('click', (event)=>{
        itemPhoto.forEach(i => {
            if(e.checked === true){
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
        }
    });
})*/

/*
let selectArr = [];
if(selectItem){
    for (let i = 0; i < selectItem.length; i++){
       selectItem[i].addEventListener('click', () => {
           if(selectItem[i].checked === true){
               if(selectArr.indexOf(selectItem[i].value) === -1){
                   selectArr.push(selectItem[i].value);
               }
           }

           selectArr.forEach(e => {

           })
       })
    }
}
*/

window.checkStatus = (status) => {
    if(status.checked){
        itemPhoto.forEach(e => {
            if(status.value === e.children[0].value){
                e.classList.remove('d-block');
                e.classList.add('d-none');
            }
        })
        selectItem.forEach(e => {
            if(status.value === e.value){
                e.classList.remove('d-none');
                e.classList.add('d-block');
            }
            if(e.checked === true){
                selectDeleteContainer.classList.remove("invisible");
                selectDeleteContainer.classList.add('visible');

/*                selectHead.classList.remove("d-none");
                selectHead.classList.add("d-block");

                normalHead.classList.remove("d-block");
                normalHead.classList.add("d-none");*/

                selectHead.classList.remove("invisible");
                selectHead.classList.add("visible");

                normalHead.classList.remove("visible");
                normalHead.classList.add("invisible");
            }
        })
        selectedStatus();
    }else{
        itemPhoto.forEach(e => {
            if(status.value === e.children[0].value){
                e.classList.remove('d-none');
                e.classList.add('d-block');
            }
        })

        selectItem.forEach(e => {
            if(status.value === e.value){
                e.classList.remove('d-block');
                e.classList.add('d-none');
            }
        })
        selectedStatus();
    }
}

// Delete Item & Submit Form
deleteItem.forEach(e => {
    e.addEventListener('click', ()=> {
        deleteItemForm.submit();
    })
});

// Confirmation Delete....
deleteBtn.addEventListener('click', () => {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-danger',
            cancelButton: 'btn btn-success'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You want to delete these files ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Delete',
        cancelButtonText: 'Cancel',
        reverseButtons: true
    }).then((result) => {
        if(result.isConfirmed){
            multipleDeleteForm.submit();
            window.showToast = function (message){
                alert(message)
            }
        }
    })

})



let btnCreateTag = document.getElementById('btn-create-tag');
let formCreate = document.getElementById('form-create');
let tagName = document.getElementById('tags_tag');




let inputtext = document.createElement('input');
inputtext.setAttribute('type', 'text');

let inputNb  = document.createElement('input');
inputtext.setAttribute('type', 'number');

let inputCheck  = document.createElement('input');
inputtext.setAttribute('type', 'checkbox');

let inputRadio  = document.createElement('input');
inputtext.setAttribute('type', 'radio');


btnCreateTag.onclick = function(){
    let tagvalue = tagName.value;
    if (tagvalue == 'ul' || tagvalue == 'ol'){

    }
    


}

// let t = document.createTextNode(tagsName.value);
//     p.appendChild(t);
//     formCreate.replaceChild(p, btnCreateTag);
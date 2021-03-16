console.log('main.js');
let current_destination= null;
let id_val = 7;

function create_destination(data) {
  let wrap_div = document.createElement('div');
  wrap_div.classList.add('destination');
  wrap_div.setAttribute('data-destId', id_val.toString());
  id_val++;
  wrap_div.appendChild(document.createElement('div'));
  let dest_name = document.createElement('p');
  dest_name.innerText = data["destination_name"];
  wrap_div.appendChild(dest_name);
  return wrap_div;
}

function add_destination(data) {
  let destination = create_destination(data);
  destination.addEventListener('click', () => {
    click_handler(destination);
  })
  let body = document.querySelector('.main-content-body');
  body.appendChild(destination);
}

function create_deleter() {
  if (current_destination == null) return;
  let elem = document.querySelector(`div.destination[data-destId="${current_destination}"]`)
  if (elem) {
    elem.remove();
  }
}

function click_handler(elem) {
  current_destination = elem.dataset.destid;
  let name = elem.querySelector('p').innerText;
  document.getElementById('dest-name').innerText = name;
}



document.querySelectorAll('div.destination').forEach((elem) => {
  elem.addEventListener('click', () => {
    click_handler(elem);
  })
})

document.getElementById('remove-dest').addEventListener('click', () => {
  create_deleter();
})

document.getElementById('modal-btn').addEventListener('click', () => {
  let name = document.getElementById('destname').value;
  add_destination({
    "destination_name": name
  });
})

document.getElementById('add-dest').addEventListener('click', () => {
  document.querySelector('.popup-modal').classList.toggle('hidden');
})
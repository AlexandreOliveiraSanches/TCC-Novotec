const modal = document.querySelector('.modal-container')
const tbody = document.querySelector('tbody')
const sDest = document.querySelector('#m-dest')
const sLivro = document.querySelector('#m-livro')
const sEmp = document.querySelector('#m-emp')
const sDev = document.querySelector('#m-dev')
const btnSalvar = document.querySelector('#btnSalvar')

let itens
let id

function openModal(edit = false, index = 0) {
  modal.classList.add('active')

  modal.onclick = e => {
    if (e.target.className.indexOf('modal-container') !== -1) {
      modal.classList.remove('active')
    }
  }

  if (edit) {
    sDest.value = itens[index].dest
    sLivro.value = itens[index].livro
    sEmp.value = itens[index].emp
    sDev.value = itens[index].dev
    id = index
  } else {
    sDest.value = ''
    sLivro.value = ''
    sEmp.value = ''
    sDev.value = ''
  }
  
}

function editItem(index) {

  openModal(true, index)
}

function deleteItem(index) {
  itens.splice(index, 1)
  setItensBD()
  loadItens()
}

function insertItem(item, index) {
  let tr = document.createElement('tr')

  tr.innerHTML = `
    <td>${item.dest}</td>
    <td>${item.livro}</td>
    <td>${item.emp}</td>
    <td>${item.dev}</td>
    <td class="acao">
      <button onclick="editItem(${index})"><i class='bx bx-edit' ></i></button>
    </td>
    <td class="acao">
      <button onclick="deleteItem(${index})"><i class='bx bx-trash'></i></button>
    </td>
  `
  tbody.appendChild(tr)
}

btnSalvar.onclick = e => {
  
  if (sDest.value == '' || sLivro.value == '' || sEmp.value == '' || sDev.value == '') {
    return
  }

  e.preventDefault();

  if (id !== undefined) {
    itens[id].dest = sNome.value
    itens[id].livro = sEmail.value
    itens[id].emp = sCPF.value
    itens[id].dev = sCel.value
  } else {
    itens.push({'destinatario': sDest.value, 'livro': sLivro.value, 'emprestimo': sEmp.value, 'devolucao': sDev.value})
  }

  setItensBD()

  modal.classList.remove('active')
  loadItens()
  id = undefined
}

function loadItens() {
  itens = getItensBD()
  tbody.innerHTML = ''
  itens.forEach((item, index) => {
    insertItem(item, index)
  })

}

const getItensBD = () => JSON.parse(localStorage.getItem('dbfunc')) ?? []
const setItensBD = () => localStorage.setItem('dbfunc', JSON.stringify(itens))

loadItens()
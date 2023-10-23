const modal = document.querySelector('.modal-container')
const tbody = document.querySelector('tbody')
const sTitulo = document.querySelector('#m-titulo')
const sAutor = document.querySelector('#m-autor')
const sLancamento = document.querySelector('#m-lancamento')
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
    sTitulo.value = itens[index].titulo
    sAutor.value = itens[index].autor
    sLancamento.value = itens[index].lancamento
    id = index
  } else {
    sTitulo.value = ''
    sAutor.value = ''
    sLancamento.value = ''
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
    <td>${item.titulo}</td>
    <td>${item.autor}</td>
    <td>${item.lancamento}</td>
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
  
  if (sTitulo.value == '' || sAutor.value == '' || sLancamento.value == '') {
    return
  }

  e.preventDefault();

  if (id !== undefined) {
    itens[id].titulo = sTitulo.value
    itens[id].autor = sAutor.value
    itens[id].lancamento = sLancamento.value
  } else {
    itens.push({'titulo': sTitulo.value, 'autor': sAutor.value, 'lancamento': sLancamento.value})
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
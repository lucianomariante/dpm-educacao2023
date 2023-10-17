const filterInput = document.getElementById('filter_input');

filterInput.addEventListener('keyup', filterNames);

function filterNames()
{
    const filterValue = document.getElementById('filter_input').value.toUpperCase();
    const itens = document.querySelectorAll('.name-docent');

    [...itens].filter(item => {
        item.closest(':not(div)').style.display = (item.innerHTML.toUpperCase().indexOf(filterValue) > -1) ? '' : 'none'});

}
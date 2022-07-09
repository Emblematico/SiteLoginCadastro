async function ajax(address) {
    const response = await fetch(address)
        .then((data) => data.text());
    return response=="true";
}
function deleteId(id) {
    document.querySelector("#"+id).remove();
}
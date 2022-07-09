document.querySelector("#campoPesquisaUsuario").addEventListener("keyup", async (e) => {
    let pesquisa = await fetch("busca-usuario.php?pesquisa="+e.target.value)
        .then((data) => data.text())
        .then((text) => text)
    document.querySelector("#resultadoUsuario").innerHTML = pesquisa;
});
document.querySelector("#campoPesquisaUsuario").dispatchEvent(new Event("keyup"));
(async () => {
    let pesquisa = await fetch("buscar-nivel.php?pesquisa=")
        .then((data) => data.text())
        .then((text) => text)
    document.querySelector("#resultadoNivel").innerHTML = pesquisa;
})();
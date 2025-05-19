let lightMode = localStorage.getItem("lightMode");
const lightModeToggle =  document.querySelector("#light-mode-toggle")

const enableLightMode = () => {
    document.body.classList.add('lightmode');

    localStorage.setItem('lightMode', 'enabled')
};

const disableLightMode = () => {
    document.body.classList.remove('lightmode');
    localStorage.setItem('lightMode', null);
};

if(lightMode === "enabled"){
    enableLightMode();
}
lightModeToggle.addEventListener("click", () => {
    lightMode = localStorage.getItem('lightMode');
    if(lightMode !== 'enabled'){
        enableLightMode();
    } else {
        disableLightMode();

    }
});

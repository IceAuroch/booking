import IMask from "imask";

const phones = document.getElementsByClassName('phone');
if (phones.length) {
    Array.from(phones).map(phone => {
        new IMask(phone, {
            mask: '+{380} 00 000-00-00',
            lazy: false,
            placeholderChar: '•'
        });
    })
}

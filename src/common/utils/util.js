import timer from "./timer";

const log = console.log.bind(console);

const on = (elem, type, callback) => {
    elem.addEventListener(type, callback);
}

const random = (min, max) => {
    return Math.floor(Math.random() * (max - min) + min);
}

const numFormat = (num) => {
    return num < 9 ? '0' + num : num;
}

const timeFormat = (time) => {
    const m = Math.floor(time / 60);
    const s = time % 60;
    return `${numFormat(m)}:${numFormat(s)}`;
};

export default {
    log,
    on,
    random,
    timer,
    numFormat,
    timeFormat,
}
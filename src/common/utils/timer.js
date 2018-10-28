export default (() => {

    const events = {};

    const o = {
        reg(id, cooldown, callback) {
            const initCooldown = cooldown;
            events[id] = {
                id,
                initCooldown,
                cooldown,
                callback,
            }
        },
        cancel(id) {
            delete events[id];
        },
        loop() {

            for (let i of Object.values(events)) {
                i.cooldown--;
                if (i.cooldown <= 0) {
                    i.cooldown = i.initCooldown;
                    i.callback();
                }
            }

            window.requestAnimationFrame(this.loop.bind(this));
        },
    }
    o.loop();
    return o;

})();
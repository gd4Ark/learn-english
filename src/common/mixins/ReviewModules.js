export default {
    computed: {
        reviewModules() {
            return this.$router.options.routes.find(
                el => el.path === "/reviewing"
            ).children;
        }
    }
}
export default {
    computed: {
        currentBook() {
            return this.$store.state.book.list.find(
                item => item.id === this.current_id
            );
        },
        current_id() {
            return this.$store.state.book.current_id;
        }
    }
}
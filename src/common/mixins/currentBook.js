export default {
    computed: {
        currentBook() {
            return this.$store.state.book.list.find(
                item => item.id === this.currentId
            );
        },
        currentId() {
            return this.$store.state.book.current_id;
        }
    }
}
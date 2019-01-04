export default {
    requestEnglishListData(state) {
        const {
            book_id,
            pageIndex,
            pageSize,
            keyword,
        } = state.english;
        const data = {
            book_id,
            pageIndex,
            pageSize,
        };
        if (keyword.length) {
            data.keyword = keyword;
        }
        return data;
    },
}
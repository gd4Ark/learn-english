export default {
    requestBookListData(state) {
        const {
            pageIndex,
            pageSize,
            keyword,
        } = state.book;
        const data = {
            pageIndex,
            pageSize,
        };
        if (keyword.length) {
            data.keyword = keyword;
        }
        return data;
    },
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
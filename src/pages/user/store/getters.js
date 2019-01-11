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
    requestReivewListData(state) {
        const {
            book_id,
        } = state.english;
        const data = {
            book_id,
            review : true,
        };
        return data;
    },
    submitData(state) {
        const {
            book_id,
        } = state.english;
        const data = {
            book_id,
        };
        return data;
    },
}
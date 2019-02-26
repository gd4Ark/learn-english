export default {
    requestData(state){
        return (origin)=>{
            const {
                pageIndex,
                pageSize,
                keyword,
            } = origin;
            const data = {
                pageIndex,
                pageSize,
            };
            if (keyword.length) {
                data.keyword = keyword;
            }
            return data;
        }
    },
    requestEnglishListData(state,getters) {
        const data = {
            book_id : state.english.book_id,
            ...getters.requestData(state.english),
        };
        return data;
    },
}
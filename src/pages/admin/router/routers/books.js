export default [
    {
        path: '/books',
        component: () => import('@/pages/admin/views/books'),
        name: 'books',
        meta: {
            title: '单词本管理'
        },
        children: [
            {
                path: ':id/words',
                component: () => import('@/pages/admin/views/words'),
                name: 'words',
                meta: {
                    title: '单词管理',
                    parent: 'book'
                },
                children: []
            }
        ]
    }
]

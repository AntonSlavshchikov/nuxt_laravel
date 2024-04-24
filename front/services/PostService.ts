export interface IPost {
    user_id: number,
    title: string,
    body: string,
    image: string|null
}

export const getPosts = async () => {
    const client = useSanctumClient()
    return await client('/api/posts')
}
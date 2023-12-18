import {useEffect, useState} from "react";
import axios from "axios";
import {Link} from "react-router-dom";
import {Table} from "antd";
import {ColumnsType} from "antd/es/table";

interface ICategoryItem {
    id: number;
    name: string;
    image: string;
}

const HomePage = () => {
    const[list, setList] = useState<ICategoryItem[]>([]);

    useEffect(() => {
        axios.get<ICategoryItem[]>("http://pv116.rozetka.com/api/categories")
            .then(resp=> {
                setList(resp.data);
            });
    },[]);

    const columns: ColumnsType<ICategoryItem> = [
        {
            title: '#',
            dataIndex: 'id'
        },
        {
            title: 'Фото',
            dataIndex: 'image',
            render: (image: string) => {
                return (
                    <img src={`http://pv116.rozetka.com/upload/150_${image}`} width={100} alt={"Фото"}/>
                )
            }
        },
        {
            title: 'Назва',
            dataIndex: 'name'
        },
    ];

    return (
        <>
            <h1>Привіт Козаки!</h1>
            <Link to={"/categories/create"}>Додати</Link>
            <Table dataSource={list} rowKey="id" columns={columns} />
        </>
    )
}

export default HomePage;
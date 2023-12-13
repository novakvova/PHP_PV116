import {useEffect, useState} from "react";
import axios from "axios";

interface ICategoryItem {
    id: number;
    name: string;
}

const HomePage = () => {
    const[list, setList] = useState<ICategoryItem[]>([]);

    const mapData = list.map(item => {
        return (
            <li key={item.id}>{item.name}</li>
        )
    });

    useEffect(() => {
        axios.get<ICategoryItem[]>("http://pv116.rozetka.com/api/categories")
            .then(resp=> {
                // console.log("Resp data", resp.data);
                setList(resp.data);
            });
    },[]);
    return (
        <>
            <h1>Привіт Козаки!</h1>
            <ul>
                {mapData}
            </ul>
        </>
    )
}

export default HomePage;
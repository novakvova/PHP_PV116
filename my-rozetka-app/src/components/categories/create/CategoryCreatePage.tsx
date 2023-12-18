import {Button, Divider, Form, Input, message, Upload, UploadFile, UploadProps} from "antd";
import {useState} from "react";
import {RcFile, UploadChangeParam} from "antd/es/upload";
import {LoadingOutlined, PlusOutlined} from '@ant-design/icons';
import {ICategoryCreate} from "../types.ts";
import axios from "axios";
import {useNavigate} from "react-router-dom";

const CategoryCreatePage = () => {

    const [file, setFile] = useState<File | null>(null);
    const navigate = useNavigate();
    const onSubmit = async (values: any) => {
        if(file==null) {
            message.error("Оберіть фото!");
            return;
        }
        const model : ICategoryCreate = {
            name: values.name,
            image: file
        };
        try {
            await axios.post("http://pv116.rozetka.com/api/categories", model,{
                headers: {
                    "Content-Type": "multipart/form-data"
                }
            });
            navigate("/");
        }
        catch (ex) {
            message.error('Помилка створення категорії!');
        }
    }
    const onSubmitFailed = (errorInfo: any) => {
        console.log("Error Form data", errorInfo);
    }

    type FieldType = {
        name?: string;
    };

    const beforeUpload = (file: RcFile) => {
        const isImage = /^image\/\w+/.test(file.type);
        if (!isImage) {
            message.error('Оберіть файл зображення!');
        }
        const isLt2M = file.size / 1024 / 1024 < 10;
        if (!isLt2M) {
            message.error('Розмір файлу не повинен перевищувать 10MB!');
        }
        console.log("is select", isImage && isLt2M);
        return isImage && isLt2M;
    };
    const handleChange: UploadProps['onChange'] = (info: UploadChangeParam<UploadFile>) => {
        const file = info.file.originFileObj as File;
        setFile(file);
    };

    const uploadButton = (
        <div>
            <PlusOutlined/>
            <div style={{marginTop: 8}}>Upload</div>
        </div>
    );

    return (
        <>
            <Divider>Додати категорію</Divider>
            <Form
                labelCol={{span: 8}}
                wrapperCol={{span: 16}}
                style={{maxWidth: 600}}
                initialValues={{remember: true}}
                onFinish={onSubmit}
                onFinishFailed={onSubmitFailed}>

                <Form.Item<FieldType>
                    label="Назва"
                    name="name"
                    rules={[{required: true, message: 'Вкажіть назву!'}]}
                >
                    <Input/>
                </Form.Item>
                <div>
                    <Upload
                        name="avatar"
                        listType="picture-card"
                        className="avatar-uploader"
                        showUploadList={false}
                        action="#"
                        beforeUpload={beforeUpload}
                        onChange={handleChange}
                        accept={"image/*"}
                    >
                        {file ?
                            <img src={URL.createObjectURL(file)} alt="avatar" style={{width: '100%'}}/> : uploadButton}
                    </Upload>
                </div>


                <Form.Item wrapperCol={{offset: 8, span: 16}}>
                    <Button type="primary" htmlType="submit">
                        Додати
                    </Button>
                </Form.Item>

            </Form>
        </>
    )
}

export default CategoryCreatePage;
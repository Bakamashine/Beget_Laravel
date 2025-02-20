import requests
import argparse
from hashlib import md5
from random import randint

API_URL = "https://api-inference.huggingface.co/models/black-forest-labs/FLUX.1-dev"
key = ""
headers = {"Authorization": "Bearer {}".format(key)}


########## Закончились токены :(
## Отправление запроса POST
# def query(api_key, url, text):
#    return requests.post(
#         url,
#         headers={
#             "authorization": f"Bearer {api_key}",
#             "accept": "image/*"
#         },
#         files={"none": ''},
#         data={
#             "prompt": text,
#             "output_format": "jpeg",
#         },
#     )

# # Генерирование случайного имени и хеширование его в md5
# def random_name() -> str:
#     arr = []
#     text = ""
#     m = md5()
#     for n in range(1,10):
#         number = randint(1,100)
#         arr.append(str(number))
#     m.update(text.join(arr).encode())
#     return m.hexdigest() + ".jpg"


# # Получение и чтение флагов с командной строки
# parser = argparse.ArgumentParser()
# parser.add_argument("text", help="Текст для генерации картинки")
# parser.add_argument("path", help="Путь для сохранения картинки")

# # Распарс флагов
# args = parser.parse_args()

# # Полученый текст для генерации картинки
# text = args.text

# # Полученный путь для сохранения картинки
# path = args.path

# # Ключ для генерации изображений
# api_key = "sk-Ak30QERa2Bl0l0XAkgpKQnzZRWa6AuBzuVfdCZPiFuL3kG7G"

# # Ссылка по которой можно отправлять запросы
# url = "https://api.stability.ai/v2beta/stable-image/generate/sd3"

# # Получение случайного имени будущего файла
# name = random_name()

# # Выполнение запроса
# response = query(api_key, url, text)

# path_name = path + name

# # Если статус равен 200, то возвращаются байты изображения, которые записываются в картинку
# # В противном случае, происходит выброс исключения с ошибкой от сервера
# if response.status_code == 200:
#     with open(path_name, 'wb') as file:
#         file.write(response.content)
#     print(path_name)
#     print(name)
# else:
#     raise Exception(str(response.json()))
